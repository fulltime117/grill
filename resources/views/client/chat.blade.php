@extends ('layouts.front')

@section('page-title')
    <title> Grillman - {{ $user->firstname }} </title>
@endsection


@section('page-styles')


<style>
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #e9ecef;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg{
  margin-bottom: 50px;
}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;  
  vertical-align: top;
  width: 98%;
  margin-bottom: 8px;
 }
 .received_withd_msg p {
  background: #f2f6f9 none repeat scroll 0 0;
  border-radius: 11px;
  font-size: 14px;
  margin: 0;
  color: #000;
  padding: 10px 13px 10px 15px;
  width: fit-content;
  border-bottom-left-radius: 0;
  word-break: break-word;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg {
  width: 57%;

  transition-timing-function: cubic-bezier(0.4, -0.04, 1, 1);
  animation-name: slideFromRight;
  animation-duration: 0.75s;
}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;  
  width: 100%;
}

 .sent_msg p {
	background: #dbf4fd none repeat scroll 0 0;
    border-radius: 11px;
    font-size: 14px;
    margin: 0;
    color: #000;
    padding: 10px 15px 10px 13px;
    width: fit-content;
    border-bottom-right-radius: 0;
    word-break: break-word;
}

.outgoing_msg{ 
  overflow:hidden; 
  margin-bottom: 8px;
}

.sent_msg {
  float: right;
  width: 46%;
  text-align: right;  
  text-align: -webkit-right;

  transition-timing-function: cubic-bezier(0.4, -0.04, 1, 1);
  animation-name: slideFromLeft;
  animation-duration: 0.9s;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
  outline: none;
  padding-right: 15px;
  overflow: auto;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #384249 none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    left: 9px;
    top: 7px;
    width: 33px;
    display: block;

}
.messaging {
	 padding: 0;
	 direction: ltr;
}
.msg_history {
  height: 45vh;
  overflow-y: auto;

}

.input_msg_write{
  direction: rtl;
}


@media only screen and (max-width:480px) {
  .sent_msg{
    width: 92%;
  }

  .received_withd_msg{
    width: 100%;
  }

  .mesgs{
    padding: 5px 0px 0px 0px;
  }

  .udb-sec{
    padding: 10px;
  }

  .received_msg{
    margin-left: 3px;
  } 
}


@keyframes slideFromLeft {
  0% {
    margin-right: -200px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0; }
  100% {
    margin-right: 0;
    filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
    opacity: 1; } }

@-webkit-keyframes slideFromLeft {
  0% {
    margin-right: -200px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0; }
  100% {
    margin-right: 0;
    filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
    opacity: 1; } }

@keyframes slideFromRight {
  0% {
    margin-left: -200px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0; }
  100% {
    margin-left: 0;
    filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
    opacity: 1; } }

@-webkit-keyframes slideFromRight {
  0% {
    margin-left: -200px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0; }
  100% {
    margin-left: 0;
    filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
    opacity: 1; } 
  }

/*  */

/* width */
#dash-chat-content::-webkit-scrollbar {
  width: 10px;

}

/* Track */
#dash-chat-content::-webkit-scrollbar-track {
  background: #f1f1f1; 
  border-radius: 100px;
}
 
/* Handle */
#dash-chat-content::-webkit-scrollbar-thumb {
  background: rgb(189, 189, 189); 
  border-radius: 100px;
}

/* Handle on hover */
#dash-chat-content::-webkit-scrollbar-thumb:hover {
  background: rgb(141, 141, 141); 
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
                            <h4><i class="fa fa-address-book-o"></i> תמיכה טכנית </h4>
                            <div class="dash-contact-container">
                                
                <div class="messaging">
                  <div class="inbox_msg">
                    <user-component :auth-user="{{ $user }}" :other-user="{{ $otherUser }}" store-url="{{ route('message.store') }}"></user-component>                    
                  </div>
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
	$(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
	});
    </script>
@endsection

