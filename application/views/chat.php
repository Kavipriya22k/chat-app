<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
body {
    margin: 0;
    background: #eef1f5;
    font-family: 'Segoe UI', sans-serif;
}

/* FULL WIDTH */
.container-fluid {
    padding: 0;
}

/* CHAT CARD */
.chat-wrapper {
    height: 100vh;
    display: flex;
    flex-direction: column;
}

/* HEADER */
.chat-header {
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    color: white;
    padding: 15px 20px;
    font-weight: 500;
}

/* CHAT AREA */
.chat-body {
    flex: 1;
    padding: 20px;
    overflow-y: auto;

    /* LIGHT BG PATTERN */

    background-color: #e5ddd5;
    background-image: url('https://www.transparenttextures.com/patterns/diamond-upholstery.png');
}

/* MESSAGE */
.message {
    max-width: 60%;
    padding: 10px 14px;
    border-radius: 10px;
    margin-bottom: 10px;
    position: relative;
    display: inline-block;
}

/* SENT */
.sent {
     background: #dcf8c6; /* WhatsApp green */
    color: #000;
    margin-left: auto;
 
}

/* RECEIVED */
.received {
    background: #e5e7eb;
    color: #333;
}

/* TIME */
.time {
    font-size: 11px;
    display: block;
    text-align: right;
    margin-top: 5px;
    opacity: 0.8;
}
.chat-header .btn {
    font-size: 14px;
    padding: 4px 10px;
}

/* INPUT */
.chat-footer {
    padding: 10px;
    background: white;
    border-top: 1px solid #ddd;
}
</style>

<div class="container-fluid">
    <div class="chat-wrapper">

        <!-- HEADER -->
        <div class="chat-header d-flex align-items-center justify-content-between">

    <!-- LEFT BACK -->
    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-light btn-sm">
        ← Back
    </a>

    <!-- CENTER TITLE -->
    <span class="mx-auto font-weight-bold">Chat App</span>

    <!-- RIGHT SPACE (for balance) -->
    <span style="width:60px;"></span>

</div>

        <!-- CHAT BODY -->
        <div class="chat-body" id="chatBox"></div>

        <!-- INPUT -->
        <div class="chat-footer">
            <div class="input-group">
                <input type="text" id="message" class="form-control" placeholder="Type message">
                <div class="input-group-append">
                    <button id="sendBtn" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- BACK BUTTON -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

// SEND MESSAGE
// SEND MESSAGE
$('#sendBtn').click(function(){
    let msg = $('#message').val();

    if(msg.trim() === ''){
        alert('Enter message');
        return;
    }

    $.post('<?php echo base_url("chat/send_message"); ?>', {message: msg}, function(){
        $('#message').val('');
        $('#message').focus();
    });
});
$('#message').keypress(function(e){
    if(e.which == 13){
        $('#sendBtn').click();
    }
});
setInterval(function(){
    $.get('<?php echo base_url("chat/get_messages"); ?>', function(res){
        let data = JSON.parse(res);
        let html = '';

        data.forEach(msg => {

let time = new Date(msg.created_at).toLocaleTimeString([], {
    hour: '2-digit',
    minute: '2-digit',
    hour12: true
});
            if(msg.name === "<?php echo $this->session->userdata('user_name'); ?>"){
                html += `
                    <div class="text-right">
                        <div class="message sent">
                            ${msg.message}
                            <span class="time">${time}</span>
                        </div>
                    </div>`;
            } else {
                html += `
                    <div class="text-left">
                        <div class="message received">
                            <strong>${msg.name}</strong><br>
                            ${msg.message}
                            <span class="time">${time}</span>
                        </div>
                    </div>`;
            }

        });

        $('#chatBox').html(html);
        $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight);
    });

}, 1000);</script>