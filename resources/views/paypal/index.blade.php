
        <form class="" action="{{route('create-payment')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group mr-4">
                <button type="submit" name="button" class="form-control">Pay Now</button>
            </div>
        </form>
This is a Checkout payment, If you want Subscriptions payment go to <a href="#">this link</a>
