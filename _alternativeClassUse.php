<?php
//$api="Bot Token"; If you've set the webhook with @PhoenixConfigBot, you've not to set this.
//This is a second way to use the runFunction. 
class tg{
  private $token, $url="https://api.telegram.org/bot";
  function __construct($token)
    {
          if(!$token) return false;
          $this->token=$token;
    }
  function run($method, $fields, $GET=false){
      $a=($GET)?"GET":"POST";
      $u=curl_init($this->url.$this->token."/".$method);
      curl_setopt($u,CURLOPT_LOW_SPEED_TIME, 10);
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
}
//Availablefunctions
function  getMe(){
  global $api;
  $q=new tg($api);
  $result=$q->run("getMe", false, false);
  return $result;
}
function sendMessage($chat_id, $text, $inline_keyboard, $reply_to_message_id=false, $parse_mode="html", $disable_web_page_preview=false, $disable_notification=false){
    global $api;
  	$q=new tg($api);
    $fields=["chat_id"=>$chat_id, "text"=>$text, "parse_mode"=>$parse_mode, "disable_web_page_preview"=>$disable_web_page_preview, "disable_notification"=>$disable_notification];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    if($reply_to_message_id) {
        $fields['reply_to_message_id']=$reply_to_message_id;
    }
    $result=$q->run("sendMessage", $fields, false);
    return $result;
}
function forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "from_chat_id"=>$from_chat_id, "message_id"=>$message_id, "disable_notification"=>$disable_notification];
    $result=$q->run("forwardMessage", $fields, false);
    return $result;
}
function sendPhoto($chat_id, $photo, $caption, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);
	$fields=["chat_id"=>$chat_id, "photo"=>$photo, "caption"=>$caption, "reply_to_message"=>$reply_to_message, "disable_notification"=>$disable_notification];
     if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendPhoto", $fields, false);
    return $result;
}
function sendAudio($chat_id, $audio, $caption, $inline_keyboard, $duration, $performer, $title, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
 	$fields=["chat_id"=>$chat_id, "audio"=>$audio, "caption"=>$caption, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    if($caption) $fields['caption']=$caption;
    if($duration) $fields['duration']=$duration;
    if($performer) $fields['performer']=$peformer;
    if($title) $fields['title']=$title;
    $result=$q->run("sendAudio", $fields, false);
    return $result;
}
function sendDocument($chat_id, $document, $caption, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "document"=>$document, "caption"=>$caption, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendDocument", $fields, false);
    return $result;
}
function sendVideo($chat_id, $video, $caption, $inline_keyboard, $duration, $width, $height, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "video"=>$video, "caption"=>$caption, "duration"=>$duration, "width"=>$width, "height"=>$height, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendVideo", $fields, false);
    return $result;
}
function sendVoice($chat_id, $voice, $caption, $inline_keyboard, $duration, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "voice"=>$voice, "caption"=>$caption, "duration"=>$duration, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendVoice", $fields, false);
    return $result;
}
function sendVideoNote($chat_id, $video_note, $inline_keyboard, $duration, $lenght, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "video_note"=>$video_note, "duration"=>$duration, "lenght"=>$lenght, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendVideoNote", $fields, false);
    return $result;
}
function sendLocation($chat_id, $latitude, $longitude, $inline_keyboard, $live_period, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "latitude"=>$latitude, "longitude"=>$longitude, "live_period"=>$live_period, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendLocation", $fields, false);
    return $result;
}
function sendContact($chat_id, $phone_number, $first_name, $last_name, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "phone_number"=>$phone_number, "first_name"=>$first_name, "last_name"=>$last_name, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendContact", $fields, false);
    return $result;
}
function getUserProfilePhotos($user_id, $offset, $limit){
    global $api;
  	$q=new tg($api);    
    $fields=["user_id"=>$user_id, "offset"=>$offset, "limit"=>$limit];
    $result=$q->run("getUserProfilePhotos", $fields, false);
    return $result;
}
function getFile($file_id){
    global $api;
  	$q=new tg($api);    
    $fields=["file_id"=>$file_id];
    $result=$q->run("getFile", $fields, false);
    return $result;
}
function kickChatMember($chat_id, $user_id, $until_date){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "user_id"=>$user_id, "until_date"=>$until_date];
    $result=$q->run("kickChatMember", $fields, false);
    return $result;
}
function unbanChatMember($chat_id, $user_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "user_id"=>$user_id];
    $result=$q->run("unbanChatMember", $fields, false);
    return $result;
}
function restrictChatMember($chat_id, $user_id, $until_date, $can_send_messages=false, $can_send_media_messages=false, $can_send_other_messages=false, $can_add_web_page_previews=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "user_id"=>$user_id, "until_date"=>$until_date,
    "can_send_messages"=>$can_send_messages,
    "can_send_media_messages"=>$can_send_media_messages,
    "can_send_other_messages"=>$can_send_other_messages,
    "can_add_web_page_previews"=>$can_add_web_page_previews];
    $result=$q->run("restrictChatMember", $fields, false);
    return $result;
}
function promoteChatMember($chat_id, $user_id, $can_change_info=true, $can_post_messages=true, $can_edit_messages=true, $can_delete_messages=true, $can_invite_users=true, $can_restrict_members=true, $can_pin_messages=true, $can_promote_members=true){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "user_id"=>$user_id,
    "can_change_info"=>$can_change_info,
    "can_pin_messages"=>$can_pin_messages,
    "can_invite_users"=>$can_invite_users,
    "can_edit_messages"=>$can_edit_messages,
    "can_post_messages"=>$can_post_messages,
    "can_delete_messages"=>$can_delete_messages,
    "can_restrict_members"=>$can_restrict_members,
    "can_promote_members"=>$can_promote_members];
    $result=$q->run("promoteChatMember", $fields, false);
    return $result;
}
function exportChatInviteLink($chat_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id];
    $result=$q->run("exportChatInviteLink", $fields, false);
    return $result;
}
function setChatPhoto($chat_id, $photo){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "photo"=>$photo];
    $result=$q->run("setChatPhoto", $fields, false);
    return $result;
}
function deleteChatPhoto($chat_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id];
    $result=$q->run("deleteChatPhoto", $fields, false);
    return $result;
}
function setChatTitle($chat_id, $title){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "title"=>$title];
    $result=$q->run("setChatTitle", $fields, false);
    return $result;
}
function setChatDescription($chat_id, $description){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "description"=>$description];
    $result=$q->run("setChatDescription", $fields, false);
    return $result;
}
function pinChatMessage($chat_id, $message_id, $disable_notification=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "message_id"=>$message_id, "disable_notification"=>$disable_notification];
    $result=$q->run("pinChatMessage", $fields, false);
    return $result;
}
function unpinChatMessage($chat_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id];
    $result=$q->run("unpinChatMessage", $fields, false);
    return $result;
}
function leaveChat($chat_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id];
    $result=$q->run("leaveChat", $fields, false);
    return $result;
}
function getChat($chat_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id];
    $result=$q->run("getChat", $fields, false);
    return $result;
}
function getChatAdministrators($chat_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id];
    $result=$q->run("getChatAdministrators", $fields, false);
    return $result;
}
function getChatMember($chat_id, $user_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "user_id"=>$user_id];
    $result=$q->run("getChatMember", $fields, false);
    return $result;
}
function getChatMemberCount($chat_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id];
    $result=$q->run("getChatMemberCount", $fields, false);
    return $result;
}
function setChatStickerSet($chat_id, $sticker_set_name){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "sticker_set_name"=>$sticker_set_name];
    $result=$q->run("setChatStickerSet", $fields, false);
    return $result;
}
function deleteChatStickerSet($chat_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id];
    $result=$q->run("deleteChatStickerSet", $fields, false);
    return $result;
}
function answerCallbackQuery($callback_query_id, $text, $show_alert=false, $url, $cache_time=5){
    global $api;
  	$q=new tg($api);    
    $fields=["callback_query_id"=>$callback_query_id, "text"=>$text, "show_alert"=>$show_alert, "url"=>$url, "cache_time"=>$cache_time];
    $result=$q->run("answerCallbackQuery", $fields, false);
    return $result;
}
function editMessageText($chat_id, $message_id, $inline_message_id, $text, $inline_keyboard, $parse_mode="html", $disable_web_page_preview=false){
    global $api;
  	$q=new tg($api);    
    //Note: $message_id and $chat_id will be required if there's not a inline_message_id and viceversa.If one of this it's set, you can put false in the other fields.
    $fields=["chat_id"=>$chat_id, "message_id"=>$message_id, "inline_message_id"=>$inline_message_id, "text"=>$text, "parse_mode"=>$parse_mdoe, "disable_web_page_preview"=>$disable_web_page_preview];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("editMessageText", $fields, false);
    return $result;
}
function editMessageCaption($chat_id, $message_id, $inline_message_id, $caption, $inline_keyboard){
    global $api;
  	$q=new tg($api);    
    //Note: $message_id and $chat_id will be required if there's not a inline_message_id and viceversa.If one of this it's set, you can put false in the other fields.
    $fields=["chat_id"=>$chat_id, "message_id"=>$message_id, "inline_message_id"=>$inline_message_id, "caption"=>$caption];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("editMessageCaption", $fields, false);
    return $result;
}
function editMessageReplyMarkup($chat_id, $message_id, $inline_message_id, $inline_keyboard){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "message_id"=>$message_id, "inline_message_id"=>$inline_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("editMessageReplyMarkup", $fields, false);
    return $result;
}
function deleteMessage($chat_id, $message_id){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "message_id"=>$message_id];
    $result=$q->run("deleteMessage", $fields, false);
    return $result;
}
function sendSticker($chat_id, $sticker, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "sticker"=>$sticker, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendSticker", $fields, false);
    return $result;
}
function getStickerSet($name){
    global $api;
  	$q=new tg($api);    
    $fields=["name"=>$name];
    $result=$q->run("getStickerSet", $fields, false);
    return $result;
}
function uploadStickerFile($user_id, $png_sticker){
    global $api;
  	$q=new tg($api);    
    $fields=["user_id"=>$user_id, "png_sticker"=>$png_sticker];
    $result=$q->run("uploadStickerFile", $fields, false);
    return $result;
}
function createNewStickerSet($user_id, $name, $title, $png_sticker, $emojis, $contains_masks=false, $mask_position=false){
    global $api;
  	$q=new tg($api);    
    //Note: mask position must be a JSON-serialized array like this: {"point":X, "x_shift":X, "y_shift":X, "scale":X}
    //X is a placeholder. Find out more on https://core.telegram.org/bots/api#mask_position
    $fields=["user_id"=>$user_id, "name"=>$name, "title"=>$title, "png_sticker"=>$png_sticker, "emojis"=>$emojis, "contains_masks"=>$contains_masks, "mask_position"=>$mask_position];
    $result=$q->run("createNewStickerSet", $fields, false);
    return $result;
}
function addStickerToSet($user_id, $name, $png_sticker, $emojis, $mask_position){
    global $api;
  	$q=new tg($api);	
    //Note: mask position must be a JSON-serialized array like this: {"point":X, "x_shift":X, "y_shift":X, "scale":X}
	//X is a placeholder. Find out more on https://core.telegram.org/bots/api#mask_position
    $fields=["user_id"=>$user_id, "name"=>$name, "png_sticker"=>$png_sticker, "emojis"=>$emojis, "mask_position"=>$mask_position];
    $result=$q->run("addStickerToSet", $fields, false);
    return $result;
}
function setStickerPositionInSet($sticker, $position){
    global $api;
  	$q=new tg($api);    
    $fields=["sticker"=>$sticker, "position"=>$position];
    $result=$q->run("setStickerPositionInSet", $fields, false);
    return $result;
}
function deleteStickerFromSet($sticker){
    global $api;
  	$q=new tg($api);    
    $fields=["sticker"=>$sticker];
    $result=$q->run("deleteStickerFromSet", $fields, false);
    return $result;
}
function answerInlineQuery($inline_query_id, $results, $cache_time, $is_personal=false, $next_offset, $switch_pm_text, $switch_pm_parameter){
    global $api;
  	$q=new tg($api);    
    //Note: $results must be a JSON-serialized array. You can find out more on https://core.telegram.org/bots/api#inlinequeryresult.
    $fields=["inline_query_id"=>$inline_query_id, "results"=>$results, "cache_time"=>$cache_time, "is_personal"=>$is_personal, "next_offset"=>$next_offset, "switch_pm_text"=>$switch_pm_text, "switch_pm_parameter"=>$switch_pm_parameter];
    $result=$q->run("answerInlineQuery", $fields, false);
    return $result;
}
function sendGame($chat_id, $game_short_name, $inline_keyboard, $disable_notification=false, $reply_to_message_id=false){
    global $api;
  	$q=new tg($api);    
    $fields=["chat_id"=>$chat_id, "game_short_name"=>$game_short_name, "disable_notification"=>$disable_notification, "reply_to_message_id"=>$reply_to_message_id];
    if($inline_keyboard) {
        $reply_markup=["inline_keyboard"=>$inline_keyboard];
        $fields['reply_markup']=json_encode($reply_markup);
    }
    $result=$q->run("sendGame", $fields, false);
    return $result;
}
function setGameScore($user_id, $score, $force, $disable_edit_message, $chat_id, $message_id, $inline_message_id){
    global $api;
  	$q=new tg($api);    
    $fields=["user_id"=>$user_id, "score"=>$score, "force"=>$force, "disable_edit_message"=>$disable_edit_message, "chat_id"=>$chat_id, "message_id"=>$message_id, "inline_message_id"=>$inline_message_id];
    $result=$q->run("setGameScore", $fields, false);
    return $result;
}
function getGameHighScore($user_id, $chat_id, $message_id, $inline_message_id){
    global $api;
  	$q=new tg($api);    
    $fields=["user_id"=>$user_id, "chat_id"=>$chat_id, "message_id"=>$message_id, "inline_message_id"=>$inline_message_id];
    $result=$q->run("getGameHighScore", $fields, false);
    return $result;
}
?>
