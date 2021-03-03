<template>
      <div class="floated-chat-w">
        <div class="floated-chat-i">
          <div class="chat-close">
            <div class="dropdown float-right mr-4">
              <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="font-size: 10px;" class="os-icon os-icon-more-vertical" aria-hidden="true"></i>
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#" v-if="session.block && can" @click.prevent="unblock">UnBlock</a>
                  <a class="dropdown-item" href="#" @click.prevent="block" v-if="!session.block">Block</a>

                  <a class="dropdown-item" href="#" @click.prevent="clear"> Clear Chat</a>
              </div>
            </div>
            <i @click.prevent="close" class="os-icon os-icon-close" style="margin-left: 20px;margin-right: 20px;"></i>
          </div>
          <div class="chat-head">
             <div class="user-w with-status" :class="{'status-green':friend.online}">
                <div class="user-avatar-w">
                   <div class="user-avatar">
                      <img alt="" src="img/avatar1.jpg">
                   </div>
                </div>
                <div class="user-name">
                   <h6 class="user-title">
                      <b :class="{'text-danger':session.block}">
                          {{friend.name}} <span v-if="isTyping">is Typing . . .</span>
                          <span v-if="session.block">(Blocked)</span>
                      </b>
                   </h6>
                   <div class="user-role">
                      Account Manager
                   </div>
                </div>
             </div>
          </div>
          <div class="chat-messages" v-chat-scroll>
             <div class="message" :class="{'text-right':chat.type == 0,'self':chat.read_at!=null}" v-for="chat in chats" :key="chat.id">
                <div class="message-content">
                   {{chat.message}}
                </div>
                <br>
                <div class="date-break">
                  {{chat.read_at}}
                </div>
             </div>
          </div>
          <div class="chat-controls">
            <form @submit.prevent="send">
             <input class="message-input" placeholder="Type your message here..." type="text" :disabled="session.block" v-model="message">
             <div class="chat-extra">
                <a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i>
                </a>
                <a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i>
                </a>
                <a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i>
                </a>
             </div>
            </form>
          </div>
        </div>
      </div>
    <!-- <div class="card card-default chat-box">
        <div class="card-header">
            <b :class="{'text-danger':session.block}">
                {{friend.name}} <span v-if="isTyping">is Typing . . .</span>
                <span v-if="session.block">(Blocked)</span>
            </b>

            <a href="" @click.prevent="close">
                <i class="fa fa-times float-right" aria-hidden="true"></i>
            </a>

            <div class="dropdown float-right mr-4">
                <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" v-if="session.block && can" @click.prevent="unblock">UnBlock</a>
                    <a class="dropdown-item" href="#" @click.prevent="block" v-if="!session.block">Block</a>

                    <a class="dropdown-item" href="#" @click.prevent="clear"> Clear Chat</a>
                </div>

            </div>

        </div>
        <div class="card-body" v-chat-scroll>
            <p class="card-text" :class="{'text-right':chat.type == 0,'text-success':chat.read_at!=null}" v-for="chat in chats" :key="chat.id">
                {{chat.message}}
                <br>
                <span style="font-size:8px">{{chat.read_at}}</span>
            </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Write your message here"
                :disabled="session.block" v-model="message">
            </div>
        </form>
    </div> -->
</template>

<script>
export default {
  props: ["friend"],
  data() {
    return {
      chats: [],
      message: null,
      isTyping: false
    };
  },
  computed: {
    session() {
      return this.friend.session;
    },
    can() {
      return this.session.blocked_by == auth.id;
    }
  },
  watch: {
    message(value) {
      if (value) {
        Echo.private(`Chat.${this.friend.session.id}`).whisper("typing", {
          name: auth.name
        });
      }
    }
  },
  methods: {
    send() {
      if (this.message) {
        this.pushToChats(this.message);
        axios
          .post(`/send/${this.friend.session.id}`, {
            content: this.message,
            to_user: this.friend.id
          })
          .then(res => (this.chats[this.chats.length - 1].id = res.data));
        this.message = null;
      }
    },
    pushToChats(message) {
      this.chats.push({
        message: message,
        type: 0,
        read_at: null,
        sent_at: "Just Now"
      });
    },
    close() {
      this.$emit("close");
    },
    clear() {
      axios
        .post(`/session/${this.friend.session.id}/clear`)
        .then(res => (this.chats = []));
    },
    block() {
      this.session.block = true;
      axios
        .post(`/session/${this.friend.session.id}/block`)
        .then(res => (this.session.blocked_by = auth.id));
    },
    unblock() {
      this.session.block = false;
      axios
        .post(`/session/${this.friend.session.id}/unblock`)
        .then(res => (this.session.blocked_by = null));
    },
    getAllMessages() {
      axios
        .post(`/session/${this.friend.session.id}/chats`)
        .then(res => (this.chats = res.data.data));
    },
    read() {
      axios.post(`/session/${this.friend.session.id}/read`);
    }
  },
  created() {
    this.read();

    this.getAllMessages();

    Echo.private(`Chat.${this.friend.session.id}`).listen(
      "PrivateChatEvent",
      e => {
        this.friend.session.open ? this.read() : "";
        this.chats.push({ message: e.content, type: 1, sent_at: "Just Now" });
      }
    );

    Echo.private(`Chat.${this.friend.session.id}`).listen("MsgReadEvent", e =>
      this.chats.forEach(
        chat => (chat.id == e.chat.id ? (chat.read_at = e.chat.read_at) : "")
      )
    );

    Echo.private(`Chat.${this.friend.session.id}`).listen(
      "BlockEvent",
      e => (this.session.block = e.blocked)
    );

    Echo.private(`Chat.${this.friend.session.id}`).listenForWhisper(
      "typing",
      e => {
        this.isTyping = true;
        setTimeout(() => {
          this.isTyping = false;
        }, 2000);
      }
    );
  }
};
</script>

<style>
.chat-box {
  height: 400px;
}
.card-body {
  overflow-y: scroll;
}
</style>
