

<div class="profile-common-data desktop-only">
    <div class="pro-user">
        <img src={{ $user->profile->getImage() }} alt="user">
    </div>
    <div class="pro-user-bio">
        <ul>
            <li>
                <h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
            </li>

            <li class="desktop-only">
                <div style="display: inline-flex;align-items: center; column-gap: 5px;"> <i class="fa fa-phone"></i>  מס' טלפון </div>
                <div style="display: inline-flex"><strong>:  {{ $user->phone }} </strong></div>
            </li>

            <li class="desktop-only">
                <div style="display: inline-flex;align-items: center; column-gap: 5px;"> <i class="fa fa-key"></i> ת.ז </div>
                <div style="display: inline-flex"><strong>:  {{ $user->identity }} </strong></div>
            </li>
        </ul>
    </div>
</div>

<div class="fixed-status-visible"></div>

@section('scripts')

<script>
 $(window).bind("scroll", function () {

    if ($(this).scrollTop() > 152) {
    $(".profile-common-data").addClass("positionfix");
    } else {
        $(".profile-common-data").removeClass("positionfix");
    }     
});
</script>

@endsection

