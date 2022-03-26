@extends ('layouts.front')

@section('page-title')
    <title> Grillman - {{ $user->firstname }} </title>
@endsection


@section('page-styles')



@endsection


@section('content')


<div class="client-dashboard">
    
    @include('layouts.client-header')

    <div class="stu-db">
        <div class="container pg-inn">
            <div class="row">
                <div class="col-md-3">
                    @include('client.includ-profile-data')
                </div>
                <div class="col-lg-9">
                    <div class="udb">
                        <div class="udb-sec udb-prof">
                            <h4><i class="fa fa-user"></i> הפרופיל שלי </h4>
                            {{-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                to using 'Content here, content here', making it look like readable English.</p> --}}
                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="bordered">
                                    <tbody>
                                        <tr class="spacer">
                                            <td><i class="fa fa-address-card-o"></i> שם </td>
                                            <td>:</td>
                                            <td>{{$user->firstname}} {{ $user->lastname }}</td>
                                        </tr>
                                        <tr class="spacer">
                                            <td><i class="fa fa-key"></i>  תעודת זהות </td>
                                            <td>:</td>
                                            <td>{{ $user->identity }}</td>
                                        </tr>
                                        <tr class="spacer">
                                            <td><i class="fa fa-envelope-o"></i> דוא"ל  </td>
                                            <td>:</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr class="spacer">
                                            <td><i class="fa fa-phone"></i>  מס' טלפון </td>
                                            <td>:</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr class="spacer">
                                            <td><i class="fa fa-calendar-o"></i> תאריך לידה  </td>
                                            <td>:</td>
                                            <td>{{ $user->profile->dob }}</td>
                                        </tr>
                                        <tr class="spacer">
                                            <td><i class="fa fa-address-book-o"></i> כתובת </td>
                                            <td>:</td>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr class="spacer">
                                            <td><i class="fa fa-building-o"></i> חברה </td>
                                            <td>:</td>
                                            <td>{{ $user->company }}</td>
                                        </tr>
                                        <tr class="spacer">
                                            <td> סטטוס </td>
                                            <td>:</td>
                                            <td><span class="db-done">
                                                @if($user->status)
                                                    <span class="badge badge-success"> active </span>
                                                @else
                                                    <span class="badge badge-warning"> pending </span>
                                                @endif
                                                </span> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="sdb-bot-edit">
                                    <a href="{{ route('client.users.edit', $user) }}" class="waves-effect waves-light btn-large sdb-btn sdb-btn-edit"> ערוך פרופיל </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>

    </script>
@endsection