<!--  -->
To Get all created plans click <a href="{{route('plans')}}">Here</a>
<br>
To Get Details of specific plan go to <a href="#">http://localhost:8000/plan/{plan_id}</a>, Visit plan lists to fetch plan_id
<br>
To Get activate specific plan go to <a href="#">http://localhost:8000/payment/plan/{plan_id}/activate</a>, Visit plan lists to fetch plan_id
<br>
To create plan click <a href="{{route('create-plan')}}">Here</a>
<br>
<br><br><br>
<br>
<p>
    To create agreement on specific payment go to click Subscribe Now (The {plan_id} is hard coded for now)
    <form class="" action="{{route('create-agreement','P-07W19518BG548425YX5HPJ6Q')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group mr-4">
            <button type="submit" name="button" class="form-control">Subscribe Now</button>
        </div>
    </form>
</p>
