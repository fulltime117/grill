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

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;  
}

 .sent_msg p {
	background: #1f2b33e3 none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
  margin-right: 10px;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
  outline: none;
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
  right: 9px;
    top: 7px;
  width: 33px;
}
.messaging {
	 padding: 0 0 50px 0;
	 direction: ltr;
}
.msg_history {
  height: 45vh;
  overflow-y: auto;

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
                            <h4><i class="fa fa-address-book-o"></i>  Chat </h4>
                            <div class="dash-contact-container">
                                
								<div class="messaging">
									<div class="inbox_msg">
									<div class="mesgs" >
										<div class="msg_history" id="dash-chat-content">
										<div class="incoming_msg">
											<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
											<div class="received_msg">
											<div class="received_withd_msg">
												<p>Test which is a new approach to have all
												solutions</p>
												<span class="time_date"> 11:01 AM    |    June 9</span></div>
											</div>
										</div>
										<div class="outgoing_msg">
											<div class="sent_msg">
											<p>Test which is a new approach to have all
												solutions</p>
											<span class="time_date"> 11:01 AM    |    June 9</span> </div>
										</div>
										<div class="incoming_msg">
											<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
											<div class="received_msg">
											<div class="received_withd_msg">
												<p>Test, which is a new approach to have</p>
												<span class="time_date"> 11:01 AM    |    Yesterday</span></div>
											</div>
										</div>
										<div class="outgoing_msg">
											<div class="sent_msg">
											<p>Apollo University, Delhi, India Test</p>
											<span class="time_date"> 11:01 AM    |    Today</span> </div>
										</div>
										<div class="incoming_msg">
											<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
											<div class="received_msg">
											<div class="received_withd_msg">
												<p>We work directly with our designers and suppliers,
												and sell direct to you, which means quality, exclusive
												products, at a price anyone can afford.</p>
												<span class="time_date"> 11:01 AM    |    Today</span></div>
											</div>
										</div>
										</div>
										<div class="type_msg">
										<div class="input_msg_write">
											<input type="text" class="write_msg" placeholder="Type a message" />
											<button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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

