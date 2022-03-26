@extends ('layouts.front')

@section('page-title')
    <title> Grillman - {{ $user->firstname }} </title>
@endsection


@section('page-styles')
<style>
    .feedback-btn{
        padding: 8px 30px;
    }
</style>
    
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
                            <h4 style="border:none;" class="mb-2"><i class="fa fa-address-book-o"></i>  היסטוריית קשר  <span class="insert-message" id="insert_message"><i class="fa fa-plus-square-o"></i></span> </h4>
                            <div class="row client-add-message">
                                <form action="{{route('client.contact.store', $user)}}" method="post">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control contact_message" name="message" id="contact_message" style="padding-top:15px; height:80px;" placeholder="הודעה "></textarea>
                                        @error('message')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="feedback-btn" value="שלח" >
                                    </div>
                                </form>
                            </div>
                            <div class="dash-contact-container">                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> תְעוּדַת זֶהוּת </th>
                                            <th> הוֹדָעָה </th>
                                            <th> תַאֲרִיך </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($contacts as $contact)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $contact->body }}</td>
                                                <td>{{ $contact->created_at }}</td>
                                            </tr>
                                        @empty
                                           
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-scripts')
    <script>
        $(document).ready(function(){                    
            $("#insert_message").click(function() {
                $(".client-add-message").toggle("swing");

                if( $("i", this).hasClass("fa-plus-square-o")){                 

                    $("i", this).removeClass("fa-plus-square-o");
                }else{
                    $("i", this).addClass("fa-plus-square-o");
                }

                $("i", this).toggleClass("fa-minus-square-o");
            });
            
        });
    </script>
@endsection

