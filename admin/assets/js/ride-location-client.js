var chat = {
  // (A) HELPER FUNCTION - SWAP BETWEEN SET NAME/SEND MESSAGE
  swapform: function (direction) {
    // (A1) SHOW SEND MESSAGE FORM
    if (direction) {
      document.getElementById("chat-name").style.display = "none";
      // document.getElementById("chat-send").style.display = "grid";
    }

    // (A2) SHOW SET NAME FORM
    else {
      // document.getElementById("chat-send").style.display = "none";
      // document.getElementById("chat-name").style.display = "grid";
      // document.getElementById("chat-name-go").disabled = false;
    }
  },

  // (B) START CHAT
  host: "ws://162.240.36.70:20258/", // Change to your own!
  name: "", // Current user name
  socket: null, // Websocket object
  htmltxt: null, // HTML send text field
  start: function () {
    // alert('connected');
    // (B1) CREATE WEB SOCKET
    document.getElementById("chat-name-go").disabled = true;

    chat.socket = new WebSocket(chat.host);


    // (B2) READY - CONNECTED TO SERVER
    chat.socket.onopen = function (e) {
      chat.name = "live_video";
      chat.swapform(1);

    };

    // (B3) ON CONNECTION CLOSE
    chat.socket.onclose = function (e) {
      chat.swapform(0);
    };

    // (B4) ON RECEIVING DATA FROM SEREVER - UPDATE CHAT MESsAGES
    chat.socket.onmessage = function (e) {
      // console.log(e);
      let msg = JSON.parse(e.data);
        // row = document.createElement("div");
      // console.log(msg.location);
      // row.innerHTML = `<div style="width:100%">msg.msg_type</div>`;
      // row.className = "ch-row";
      // document.getElementById("chat-messages").appendChild(row);
      // if (msg.msg_type == "send_offer") {
      //   if (msg.device_id == "1" ) {
      //     console.log(msg);
      //     join(msg.offer)
      //   }

      // }
      if (msg.msg_type == "response_ride_location") 
      {
        // console.log(msg);
        
        if(msg.location)
        {
          var json=msg.location;
          var str_loc=JSON.stringify(msg.location);
          $("#ongoing_rides_live_data").val(btoa(str_loc));
        }else
        {
          $("#ongoing_rides_live_data").val("");
        }
        // console.log(msg);
        // $("#ongoing_rides_live_data").trigger("change");

      }
      if (msg.msg_type == "response_pass_location") 
      {
        // console.log('location_updated');
        // console.log(msg.location);
        // car_decoded_msg=JSON.parse(msg);
        if(msg.location)
        {
          var str_loc=JSON.stringify(msg.location);
          console.log(str_loc);
          $("#ongoing_driver_live_data").val(btoa(str_loc));
        }else
        {
          $("#ongoing_driver_live_data").val("");
        }
        $("#ongoing_driver_live_data").trigger("change");

      }
      if (msg.msg_type == "pass_location") 
      {
        // console.log('location_updated');
        // console.log(msg.location);
        // car_decoded_msg=JSON.parse(msg);
        console.log(msg);
        if(msg.driver_id)
        {
          var driver_id=msg.driver_id;
          var driver_lat=msg.driver_lat;
          var driver_lng=msg.driver_lng;
          var location={
            lat:parseFloat(driver_lat),
            lng:parseFloat(driver_lng)
          };
          
          if($("#ongoing_rides_live_data"+driver_id).length)
          {
            
            // location['id']=driver_id;
            var str_loc=(location);
            $("#ongoing_rides_live_data"+driver_id).val(JSON.stringify(str_loc));
            console.log();
          }
          // console.log(driver_id);
         
        }else
        {
          $("#ongoing_rides_live_data"+driver_id).val("");
        }
        $("#ongoing_rides_live_data"+driver_id).trigger("change");

      }
      // response_ride_location
      if (msg.msg_type == "add_candidate") {
        if (msg.device_id == "1" && msg.machine=="mobile" ) {
          // console.log(msg.candidate);
          // AddCandidate(msg.candidate);
          
        }

      }
    };

    // (B5) ON ERROR
    chat.socket.onerror = function (e) {
      chat.swapform(0);
      // console.log(e);
      alert(`Failed to connect Live Network, Try Again Later.`);
      window.location.href="index.php?pid=home";
    };

    return false;
  },

  // (C) SEND MESSAGE
  


  sendDriverLocation: function () {
    let message = JSON.stringify({
      driver_lat: "22.473042",
      driver_lng: "70.049284",
      driver_id: "2",
      msg_type: "pass_location"
    });
    // chat.htmltxt.value = "";
    chat.socket.send(message);
    return false;
  },

  sendDriverLocation2: function () {
    let message = JSON.stringify({
      driver_lat: "22.470226",
      driver_lng: "70.049414",
      driver_id: "3",
      msg_type: "pass_location"
    });
    // chat.htmltxt.value = "";
    chat.socket.send(message);
    return false;
  },

  sendRideLocation1: function () {
    let message = JSON.stringify({
      driver_lat: "22.470226",
      driver_lng: "70.049414",
      driver_id: "2",
      ride_id: "54",
      msg_type: "ride_location"
    });
    

    
    // chat.htmltxt.value = "";
    chat.socket.send(message);
    return false;
  },

  sendRideLocation2: function () {
    let message = JSON.stringify({
      driver_lat: "22.470226",
      driver_lng: "70.049414",
      driver_id: "3",
      ride_id: "55",
      msg_type: "ride_location"
    });

    
    // chat.htmltxt.value = "";
    chat.socket.send(message);
    return false;
  },

  requestRideLocation: function () {
    let message = JSON.stringify({
      
      msg_type: "request_ride_location"
    });

    
    // chat.htmltxt.value = "";
    chat.socket.send(message);
    return false;
  },
  requestDriverLocation: function () {
    let message = JSON.stringify({
      
      msg_type: "request_pass_location"
    });

    
    // chat.htmltxt.value = "";
    chat.socket.send(message);
    return false;
  },

};

// var configuration = {
//   iceServers: [{ url: "turn:turn-server-mobile.com:80", credential: "my_password", username: "my_username" }, { url: "turn:163.172.71.160:3478", credential: "my_password", username: "my_username" }]
// };

var configuration = {
  "iceServers": [
    // { "urls": "stun:stun.l.google.com:19302" }, { "urls": "stun:stun1.l.google.com:19302" }, { "urls": "stun:stun2.l.google.com:19302" }, { "urls": "stun:stun3.l.google.com:19302" },
    {
      'urls': 'turn:192.158.29.39:3478?transport=udp',
      'credential': 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
      'username': '28224511:1379330808'
    },
    {
      'urls': 'turn:192.158.29.39:3478?transport=tcp',
      'credential': 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
      'username': '28224511:1379330808'
    }
  ]
};
var pc = new RTCPeerConnection();
pc.setConfiguration(configuration);

// Give Answer
async function AddCandidate(CANDIDATE)
{
  
  // const candidate = await new RTCIceCandidate(CANDIDATE);
  
  // await pc.addIceCandidate(candidate);
  await pc.addIceCandidate(new RTCIceCandidate({ sdpMLineIndex: CANDIDATE.sdpMLineIndex, sdpMid: CANDIDATE.sdpMid, candidate: CANDIDATE.candidate }));
  // console.log("Candidate-Index: ", CANDIDATE.sdpMLineIndex);
  // console.log("Candidate-Index: ", CANDIDATE.sdpMid);
  // console.log("Candidate-Index: ", CANDIDATE.sdpMLineIndex);
}
async function join(offer) {
  // var localVideo = document.getElementById('localVideo');
  var remoteVideo = document.getElementById('remoteVideo');
  // var createCallButton = document.getElementById('createCallButton');
  // var hangupButton = document.getElementById('hangupButton');
  // var localStream = null;

  if (offer) {
    

    const stream = await navigator.mediaDevices.getUserMedia({
      audio: true,
      // video: true,
      video: {
        width: screen.width * .5,
        height: screen.height * .6
      }
    })

    if (typeof stream != "boolean") {
      await pc.addStream(stream);
    }

    pc.ontrack = (e) => {
      // console.log("ontrack: ", e.streams[0])
      remoteVideo.style = "display:object";
      remoteVideo.srcObject = e.streams[0];
    };
    var IsCandidateAdded=false;
    var IsAnswerSent=false;
    pc.onicecandidate = async (event) => {

      if (event.candidate && !IsCandidateAdded) {
        const addC = {
          msg_type: 'add_candidate',
          device_id: '1',
          machine:'laptop',
          candidate: event.candidate,
        }
        IsCandidateAdded=true;
        // AddCandidate(event.candidate);
        chat.socket.send(JSON.stringify(addC));
      }
    };

    if (pc) {
      await pc.setRemoteDescription(new RTCSessionDescription(offer));

      const answer = await pc.createAnswer();
      await pc.setLocalDescription(answer);

      const cWithAnswer = {
        msg_type: 'give_answer',
        device_id: '1',
        machine:'laptop',
        answer: {
          type: answer.type,
          sdp: answer.sdp
        }
      };
      console.log(cWithAnswer);
      if(!IsAnswerSent)
      {
        IsAnswerSent=true;
        chat.socket.send(JSON.stringify(cWithAnswer));
        
      }
      
    }
  }
}