<section class="details_form">
<?php echo $this->Form->create('User', array('action' => 'login'));?>
<ul>
<li><h2>Administrator Login</h2></li>
<?php
	    echo $this->Form->input('username',array('class'=>'input text','required'=>'required'));
		echo $this->Form->input('password',array('class'=>'input text','required'=>'required'));
?>
<li><span><input name="save" type="submit" class="button" value="Login" /></span></li>
</ul>
</form>
</section>



