<template>
<div class="full-chat-w">
   <div class="full-chat-i">
      <div class="full-chat-left">
         <div class="os-tabs-w">
            <ul class="nav nav-tabs upper centered">
               <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab"><i class="os-icon os-icon-mail-14"></i><span>Chats</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" ><i class="os-icon os-icon-ui-02"></i><span>Favorites</span></a>
               </li>
            </ul>
         </div>
         <div class="chat-search">
            <div class="element-search">
               <input placeholder="Search users by name..." type="text">
            </div>
         </div>
         <div class="user-list">
            <div class="user-w" @click.prevent="openChat(friend)"
               :key=friend.id
               v-for="friend in friends">
               <div class="avatar with-status status-green">
                  <img alt="" src="img/avatar1.jpg">
               </div>
               <div class="user-info">
                  <div class="user-date">
                     2 days
                  </div>
                  <div class="user-name">
                     {{friend.first_name}}
                  </div>
                  <div class="last-message">
                     They have submitted users...
                  </div>
                  <i class="fa fa-circle float-right text-success" v-if="friend.online" aria-hidden="true"></i>
                  <strong class="badge badge-danger" v-if="friend.session && (friend.session.unreadCount > 0)">{{friend.session.unreadCount}}</strong>
               </div>
            </div>
         </div>
      </div>
      <div class="full-chat-middle" v-for="friend in friends" :key="friend.id" v-if="friend.session">
         <message-component
            v-if="friend.session.open"
            @close="close(friend)"
            :friend=friend
            ></message-component>
      </div>
   </div>
  <!--  <div class="col-md-9">
      <span v-for="friend in friends" :key="friend.id" v-if="friend.session">
         <message-component
            v-if="friend.session.open"
            @close="close(friend)"
            :friend=friend
            ></message-component>
      </span>
   </div> -->
</div>
</template>

<script>
import MessageComponent from "./MessageComponent";
export default {
  data() {
    return {
      friends: []
    };
  },
  methods: {
    close(friend) {
      friend.session.open = false;
    },
    getFriends() {
      axios.post("/getFriends").then(res => {
        this.friends = res.data.data;
        this.friends.forEach(
          friend => (friend.session ? this.listenForEverySession(friend) : "")
        );
      });
    },
    openChat(friend) {
      if (friend.session) {
        this.friends.forEach(
          friend => (friend.session ? (friend.session.open = false) : "")
        );
        friend.session.open = true;
        friend.session.unreadCount = 0;
      } else {
        this.createSession(friend);
      }
    },
    createSession(friend) {
      axios.post("/session/create", { friend_id: friend.id }).then(res => {
        (friend.session = res.data.data), (friend.session.open = true);
      });
    },
    listenForEverySession(friend) {
      Echo.private(`Chat.${friend.session.id}`).listen(
        "PrivateChatEvent",
        e => (friend.session.open ? "" : friend.session.unreadCount++)
      );
    }
  },
  created() {
    this.getFriends();

    Echo.channel("Chat").listen("SessionEvent", e => {
      let friend = this.friends.find(friend => friend.id == e.session_by);
      friend.session = e.session;
      this.listenForEverySession(friend);
    });

    Echo.join(`Chat`)
      .here(users => {
        this.friends.forEach(friend => {
          users.forEach(user => {
            if (user.id == friend.id) {
              friend.online = true;
            }
          });
        });
      })
      .joining(user => {
        this.friends.forEach(
          friend => (user.id == friend.id ? (friend.online = true) : "")
        );
      })
      .leaving(user => {
        this.friends.forEach(
          friend => (user.id == friend.id ? (friend.online = false) : "")
        );
      });
  },
  components: { MessageComponent }
};
</script>