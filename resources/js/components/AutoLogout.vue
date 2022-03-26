<template>
    <div>
        <div v-if="warningZone" class="cover">
            <div class="infobox-3">
                <div class="info-icon">
                    <img :src="adminImg" width="50px" height="50px">
                </div>
                <h5 class="info-heading">No Activity</h5>
                <p class="info-text">If you will do no activity, you will be logout within a few minutes</p>
                <a :href="logoutUrl" class="info-link">Logout <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'AutoLogout',
        
        props: ['adminImg'],
        
        data: function() {
            return {
                events: ['click', 'mousemove', 'mousedown', 'scroll', 'load', 'keypress'],
                warningTimer: null,
                warningZone: false,
            } 
        
        },
        
        mounted() {
            this.events.forEach(function(event) {
                window.addEventListener(event, this.resetTimers);
            }, this);  
            
            this.setTimers();
            
        },
        
        destroyed() {
            this.events.forEach(function(event) {
                window.removeEventListener(event, this.resetTimers);
            }, this);  
            
            this.reSetTimers();
        },
        
        methods: {
            setTimers() {
                this.warningTimer = setTimeout(this.warningMessage, 20*60*1000);
                this.logoutTimer = setTimeout(this.logoutUser, 23*60*1000);
            },
            
            warningMessage: function() {
                this.warningZone = true;
            },
            
            logoutUser() {
                document.getElementById('logout').click();
            },
            
            resetTimers: function() {
                clearTimeout(this.warningTimer);
                clearTimeout(this.logoutTimer);
                this.warningZone = false;
                this.setTimers();
            },
        },
    
    
    }
</script>

<style>
    .cover {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 9990;
    }
    .infobox-3 {
      position: absolute;
        border: 1px solid #e0e6ed;
        width: 50%;
        max-width: 600px;
        top: calc(50vh - 300px);
        right: calc(50vw - 300px);
        padding: 50px 25px 25px 25px;
        border-radius: 6px;
        box-shadow: 0px 2px 10px 1px rgb(31 45 61 / 10%);
        margin-left: auto;
        margin-right: auto;
        background: white;
      margin-right: auto; }
      .infobox-3 .info-icon {
        position: absolute;
        margin-bottom: 20px;
        background: #d82b2b;
        display: inline-block;
        top: -31px;
        padding: 6px;
        border-radius: 6px; }
        .infobox-3 .info-icon svg {
          width: 50px;
          height: 50px;
          stroke-width: 1px;
          color: #fff; }
      .infobox-3 .info-heading {
        font-weight: 600;
        font-size: 19px;
        margin-bottom: 14px;
        letter-spacing: 2px; }
      .infobox-3 .info-text {
        font-size: 15px;
        color: #888ea8;
        margin-bottom: 15px; }
      .infobox-3 .info-link {
        color: #1b55e2;
        font-weight: 600; }
        .infobox-3 .info-link svg {
          width: 15px;
          height: 15px; }
    
    @media (max-width: 575px) {
      .infobox-1, .infobox-2, .infobox-3 {
        width: calc(100% - 20px);
        left: 10px;
        right: 10px; } }
</style>