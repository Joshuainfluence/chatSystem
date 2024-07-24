<?php

    while ($row = mysqli_fetch_assoc($sql)) {
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
         OR outgoing_msg_id = {$row['unique_id']}) AND (incoming_msg_id = {$outgoing_id} 
         OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
        }else{
            $result = "No message available";
        }
        // triming message if words are more than 20
        (strlen($result) > 20) ? $msg = substr($result, 0, 20)  . "...": $msg = $result; 
        // adding you: text berfore msg if login id send msg
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = null;
       
        //check if user is online or offline
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
       
        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
        <div class="content">
            <img src="php/images/' . $row['img'] . '" alt="">
            <div class="details">
                <span>' . ucfirst($row['fname']) . " " . ucfirst($row['lname']) . '</span>
                <p>'.$you . $msg.'</p>
            </div>
        </div>
        <div class="status-dot '.$offline.'">
            <i class="fa fa-circle"></i>
        </div>
    </a>';
    }
