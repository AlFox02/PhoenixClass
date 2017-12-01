<?php
// Standard queries method is HTTP POST.
// Standard url is https://api.telegram.org.
class phoenix{
    private $token, $url="https://api.telegram.org/bot";
    public function __construct($token)
    {
          if(!$token) return false;
          $this->token=$token;
    }
    public function run($method, $fields, $GET=false){
      $a=($GET)?"GET":"POST";
      $u=curl_init($this->url.$this->token."/".$method);
      curl_setopt($u,CURLOPT_LOW_SPEED_TIME, 5);
      curl_setopt($u, CURLOPT_CUSTOMREQUEST, $a);
      curl_setopt($u, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($u, CURLOPT_POSTFIELDS, $fields);
      $result=curl_exec($u);
      if(!$result){
      		return false;
      } else {
      		return $result;
      }
      curl_close($u);
    }
    public function  getMe(){
      $result=$this->run("getMe", false, false);
      return $result;
    }
    public function sendMessage($chat_id, $text, $inline_keyboard, $reply_to_message_id=false, $parse_mode="html", $disable_web_page_preview=false, $disable_notification=false){
    	  $fields=["chat_id"=>$chat_id, "text"=>$text, "parse_mode"=>$parse_mode, "disable_web_page_preview"=>$disable_web_page_preview, "disable_notification"=>$disable_notification];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        if($reply_to_message_id) {
        		$fields['reply_to_message_id']=$reply_to_message_id;
        }
		    $result=$this->run("sendMessage", $fields, false);
        return $result;
    }
    public function forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification=false){
    	  $fields=["chat_id"=>$chat_id, "from_chat_id"=>$from_chat_id, "message_id"=>$message_id, "disable_notification"=>$disable_notification];
        $result=$this->run("forwardMessage", $fields, false);
        return $result;
    }
    public function sendPhoto($chat_id, $photo, $caption, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
    	   $fields=["chat_id"=>$chat_id, "photo"=>$photo, "caption"=>$caption, "reply_to_message"=>$reply_to_message, "disable_notification"=>$disable_notification];
         if($inline_keyboard) {
         		$reply_markup=["inline_keyboard"=>$inline_keyboard];
     		    $fields['reply_markup']=json_encode($reply_markup);
 		    }
        $result=$this->run("sendPhoto", $fields, false);
        return $result;
    }
    public function sendAudio($chat_id, $audio, $caption, $inline_keyboard, $duration, $performer, $title, $disable_notification=false, $reply_to_message_id=false){
        $fields=["chat_id"=>$chat_id, "audio"=>$audio, "caption"=>$caption, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        if($caption) $fields['caption']=$caption;
        if($duration) $fields['duration']=$duration;
        if($performer) $fields['performer']=$peformer;
        if($title) $fields['title']=$title;
        $result=$this->run("sendAudio", $fields, false);
        return $result;
    }
    public function sendDocument($chat_id, $document, $caption, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
        $fields=["chat_id"=>$chat_id, "document"=>$document, "caption"=>$caption, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        $result=$this->run("sendDocument", $fields, false);
        return $result;
    }
    public function sendVideo($chat_id, $video, $caption, $inline_keyboard, $duration, $width, $height, $disable_notification=false, $reply_to_message_id=false){
        $fields=["chat_id"=>$chat_id, "video"=>$video, "caption"=>$caption, "duration"=>$duration, "width"=>$width, "height"=>$height, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        $result=$this->run("sendVideo", $fields, false);
        return $result;
    }
    public function sendVoice($chat_id, $voice, $caption, $inline_keyboard, $duration, $disable_notification=false, $reply_to_message_id=false){
        $fields=["chat_id"=>$chat_id, "voice"=>$voice, "caption"=>$caption, "duration"=>$duration, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        $result=$this->run("sendVoice", $fields, false);
        return $result;
    }
    public function sendVideoNote($chat_id, $video_note, $inline_keyboard, $duration, $lenght, $disable_notification=false, $reply_to_message_id=false){
        $fields=["chat_id"=>$chat_id, "video_note"=>$video_note, "duration"=>$duration, "lenght"=>$lenght, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        $result=$this->run("sendVideoNote", $fields, false);
        return $result;
    }
    public function sendLocation($chat_id, $latitude, $longitude, $inline_keyboard, $live_period, $disable_notification=false, $reply_to_message_id=false){
        $fields=["chat_id"=>$chat_id, "latitude"=>$latitude, "longitude"=>$longitude, "live_period"=>$live_period, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        $result=$this->run("sendLocation", $fields, false);
        return $result;
    }
    public function sendContact($chat_id, $phone_number, $first_name, $last_name, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
        $fields=["chat_id"=>$chat_id, "phone_number"=>$phone_number, "first_name"=>$first_name, "last_name"=>$last_name, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        $result=$this->run("sendContact", $fields, false);
        return $result;
    }
    public function getUserProfilePhotos($user_id, $offset, $limit){
        $fields=["user_id"=>$user_id, "offset"=>$offset, "limit"=>$limit];
        $result=$this->run("getUserProfilePhotos", $fields, false);
        return $result;
    }
    public function getFile($file_id){
        $fields=["file_id"=>$file_id];
        $result=$this->run("getFile", $fields, false);
        return $result;
    }
    public function kickChatMember($chat_id, $user_id, $until_date){
        $fields=["chat_id"=>$chat_id, "user_id"=>$user_id, "until_date"=>$until_date];
        $result=$this->run("kickChatMember", $fields, false);
        return $result;
    }
    public function unbanChatMember($chat_id, $user_id){
        $fields=["chat_id"=>$chat_id, "user_id"=>$user_id];
        $result=$this->run("unbanChatMember", $fields, false);
        return $result;
    }
    public function restrictChatMember($chat_id, $user_id, $until_date, $can_send_messages=false, $can_send_media_messages=false, $can_send_other_messages=false, $can_add_web_page_previews=false){
        $fields=["chat_id"=>$chat_id, "user_id"=>$user_id, "until_date"=>$until_date,
        "can_send_messages"=>$can_send_messages,
        "can_send_media_messages"=>$can_send_media_messages,
        "can_send_other_messages"=>$can_send_other_messages,
        "can_add_web_page_previews"=>$can_add_web_page_previews];
        $result=$this->run("restrictChatMember", $fields, false);
        return $result;
    }
    public function promoteChatMember($chat_id, $user_id, $can_change_info=true, $can_post_messages=true, $can_edit_messages=true, $can_delete_messages=true, $can_invite_users=true, $can_restrict_members=true, $can_pin_messages=true, $can_promote_members=true){
        $fields=["chat_id"=>$chat_id, "user_id"=>$user_id,
        "can_change_info"=>$can_change_info,
        "can_pin_messages"=>$can_pin_messages,
        "can_invite_users"=>$can_invite_users,
        "can_edit_messages"=>$can_edit_messages,
        "can_post_messages"=>$can_post_messages,
        "can_delete_messages"=>$can_delete_messages,
        "can_restrict_members"=>$can_restrict_members,
        "can_promote_members"=>$can_promote_members];
        $result=$this->run("promoteChatMember", $fields, false);
        return $result;
    }
    public function exportChatInviteLink($chat_id){
        $fields=["chat_id"=>$chat_id];
        $result=$this->run("exportChatInviteLink", $fields, false);
        return $result;
    }
    public function setChatPhoto($chat_id, $photo){
        $fields=["chat_id"=>$chat_id, "photo"=>$photo];
        $result=$this->run("setChatPhoto", $fields, false);
        return $result;
    }
    public function deleteChatPhoto($chat_id){
        $fields=["chat_id"=>$chat_id];
        $result=$this->run("deleteChatPhoto", $fields, false);
        return $result;
    }
    public function setChatTitle($chat_id, $title){
        $fields=["chat_id"=>$chat_id, "title"=>$title];
        $result=$this->run("setChatTitle", $fields, false);
        return $result;
    }
    public function setChatDescription($chat_id, $description){
        $fields=["chat_id"=>$chat_id, "description"=>$description];
        $result=$this->run("setChatDescription", $fields, false);
        return $result;
    }
    public function pinChatMessage($chat_id, $message_id, $disable_notification=false){
        $fields=["chat_id"=>$chat_id, "message_id"=>$message_id, "disable_notification"=>$disable_notification];
        $result=$this->run("pinChatMessage", $fields, false);
        return $result;
    }
    function unpinChatMessage($chat_id){
        $fields=["chat_id"=>$chat_id];
        $result=$this->run("unpinChatMessage", $fields, false);
        return $result;
    }
    public function leaveChat($chat_id){
        $fields=["chat_id"=>$chat_id];
        $result=$this->run("leaveChat", $fields, false);
        return $result;
    }
    public function getChat($chat_id){
        $fields=["chat_id"=>$chat_id];
        $result=$this->run("getChat", $fields, false);
        return $result;
    }
    public function getChatAdministrators($chat_id){
        $fields=["chat_id"=>$chat_id];
        $result=$this->run("getChatAdministrators", $fields, false);
        return $result;
    }
    public function getChatMember($chat_id, $user_id){
        $fields=["chat_id"=>$chat_id, "user_id"=>$user_id];
        $result=$this->run("getChatMember", $fields, false);
        return $result;
    }
    public function getChatMemberCount($chat_id){
        $fields=["chat_id"=>$chat_id];
        $result=$this->run("getChatMemberCount", $fields, false);
        return $result;
    }
    public function setChatStickerSet($chat_id, $sticker_set_name){
        $fields=["chat_id"=>$chat_id, "sticker_set_name"=>$sticker_set_name];
        $result=$this->run("setChatStickerSet", $fields, false);
        return $result;
    }
    public function deleteChatStickerSet($chat_id){
        $fields=["chat_id"=>$chat_id];
        $result=$this->run("deleteChatStickerSet", $fields, false);
        return $result;
    }
    public function answerCallbackQuery($callback_query_id, $text, $show_alert=false, $url, $cache_time=5){
        $fields=["callback_query_id"=>$callback_query_id, "text"=>$text, "show_alert"=>$show_alert, "url"=>$url, "cache_time"=>$cache_time];
        $result=$this->run("answerCallbackQuery", $fields, false);
        return $result;
    }
    public function editMessageText($chat_id, $message_id, $inline_message_id, $text, $inline_keyboard, $parse_mode="html", $disable_web_page_preview=false){
        //Note: $message_id and $chat_id will be required if there's not a inline_message_id and viceversa.If one of this it's set, you can put false in the other fields.
        $fields=["chat_id"=>$chat_id, "message_id"=>$message_id, "inline_message_id"=>$inline_message_id, "text"=>$text, "parse_mode"=>$parse_mdoe, "disable_web_page_preview"=>$disable_web_page_preview];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        $result=$this->run("editMessageText", $fields, false);
        return $result;
    }
    public function editMessageCaption($chat_id, $message_id, $inline_message_id, $caption, $inline_keyboard){
        //Note: $message_id and $chat_id will be required if there's not a inline_message_id and viceversa.If one of this it's set, you can put false in the other fields.
        $fields=["chat_id"=>$chat_id, "message_id"=>$message_id, "inline_message_id"=>$inline_message_id, "caption"=>$caption];
        if($inline_keyboard) {
        		$reply_markup=["inline_keyboard"=>$inline_keyboard];
    		    $fields['reply_markup']=json_encode($reply_markup);
		    }
        $result=$this->run("editMessageCaption", $fields, false);
        return $result;
    }
    public function editMessageReplyMarkup($chat_id, $message_id, $inline_message_id, $inline_keyboard){
        $fields=["chat_id"=>$chat_id, "message_id"=>$message_id, "inline_message_id"=>$inline_message_id];
        if($inline_keyboard) {
            $reply_markup=["inline_keyboard"=>$inline_keyboard];
            $fields['reply_markup']=json_encode($reply_markup);
        }
        $result=$this->run("editMessageReplyMarkup", $fields, false);
        return $result;
    }
    public function deleteMessage($chat_id, $message_id){
        $fields=["chat_id"=>$chat_id, "message_id"=>$message_id];
        $result=$this->run("deleteMessage", $fields, false);
        return $result;
    }
    public function sendSticker($chat_id, $sticker, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
        $fields=["chat_id"=>$chat_id, "sticker"=>$sticker, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message];
        if($inline_keyboard) {
            $reply_markup=["inline_keyboard"=>$inline_keyboard];
            $fields['reply_markup']=json_encode($reply_markup);
        }
        $result=$this->run("sendSticker", $fields, false);
        return $result;
    }
    public function getStickerSet($name){
        $fields=["name"=>$name];
        $result=$this->run("getStickerSet", $fields, false);
        return $result;
    }
    public function uploadStickerFile($user_id, $png_sticker){
        $fields=["user_id"=>$user_id, "png_sticker"=>$png_sticker];
        $result=$this->run("uploadStickerFile", $fields, false);
        return $result;
    }
    public function createNewStickerSet($user_id, $name, $title, $png_sticker, $emojis, $contains_masks=false, $mask_position=false){
        //Note: mask position should be a JSON-serialized object like this: {"point":X, "x_shift":X, "y_shift":X, "scale":X}
        //X is a placeholder. Find out more on https://core.telegram.org/bots/api#mask_position
        $fields=["user_id"=>$user_id, "name"=>$name, "title"=>$title, "png_sticker"=>$png_sticker, "emojis"=>$emojis, "contains_masks"=>$contains_masks, "mask_position"=>$mask_position];
        $result=$this->run("createNewStickerSet", $fields, false);
        return $result;
    }
    public function addStickerToSet($user_id, $name, $png_sticker, $emojis, $mask_position){
    //Note: mask position should be a JSON-serialized object like this: {"point":X, "x_shift":X, "y_shift":X, "scale":X}
    //X is a placeholder. Find out more on https://core.telegram.org/bots/api#mask_position
        $fields=["user_id"=>$user_id, "name"=>$name, "png_sticker"=>$png_sticker, "emojis"=>$emojis, "mask_position"=>$mask_position];
        $result=$this->run("addStickerToSet", $fields, false);
        return $result;
    }
    public function setStickerPositionInSet($sticker, $position){
        $fields=["sticker"=>$sticker, "position"=>$position];
        $result=$this->run("setStickerPositionInSet", $fields, false);
        return $result;
    }
    public function deleteStickerFromSet($sticker){
        $fields=["sticker"=>$sticker];
        $result=$this->run("deleteStickerFromSet", $fields, false);
        return $result;
    }
}
