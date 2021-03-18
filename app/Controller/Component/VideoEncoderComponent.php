<?php
App::uses('Component', 'Controller');
 
class VideoEncoderComponent extends Component {
	
	/**
	 * Everything in this method can be placed into a global configuration
	 * file that is called at bootstrap/runtime.
	 **/
	public function __construct () {
		// ffmpeg path
		Configure::write('Video.ffmpeg_path', '/usr/bin/ffmpeg');

		// flvtool2 path
		Configure::write('Video.flvtool2_path', '/usr/bin/flvtool2');

		// Bitrate of audio (valid vaues are 16,32,64)
		Configure::write('Video.bitrate', 64);

		// Sampling rate (valid values are 11025, 22050, 44100)
		Configure::write('Video.samprate', 44100);
	}
	
 public function convert_video ($in, $out, $width = 480, $height = 360, $optimized = false) {
 
		//if ($optimized == false) {
			//$command ="/usr/bin/ffmpeg -i {$in} -y -s {$width}x{$height} -r 30 -b 500 -ar 44100 -ab 64 {$out} 2>";
		//} else {
			//$command = Configure::read('Video.ffmpeg_path') . " -i {$in} -b 256k -ac 1 -ar 44100 {$out}";
		//}
		//shell_exec($command);
		
		
		$command='/usr/bin/ffmpeg -i '.$in.' -ab 56 -ar 44100 -b 200 -r 15 -s 320x240 -f flv '.$out;
		
		shell_exec($command);
	}
	
	function set_buffering ($in) {
		$command = Configure::read('Video.flvtool2_path') . " -U {$in}";
		shell_exec($command);
	}
	
	function grab_image ($in, $out) {
		$command = Configure::read('Video.ffmpeg_path') . " -y -i {$in} -f mjpeg -t 0.003 {$out}";
		shell_exec($command);
	}
	
	function get_duration ($in) {
		$command = Configure::read('Video.ffmpeg_path') . " -i {$in} 2>&1 | grep \"Duration\" | cut -d ' ' -f 4 | sed s/,//";
		return shell_exec($command);
	}
	
	function get_filesize ($in) {
		return filesize($in);
	}
	
	function remove_uploaded_video ($in) {
		unlink($in);
	}
}