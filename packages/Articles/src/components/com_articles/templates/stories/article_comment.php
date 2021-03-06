<? defined('KOOWA') or die('Restricted access');?>

<data name="title">
	<?= sprintf(@text('COM-ARTICLES-STORY-COMMENT'), @name($subject), @route($object->getURL().'&permalink='.$comment->id)) ?>
</data>

<data name="body">
	<? if ($object->coverSet()): ?>
	<div class="entity-portrait-medium">
		<?= @cover($object, 'medium') ?>
	</div>
	<? endif ?>
	
    <h4 class="entity-title">
    	<?= @link($object) ?>
    </h4>
    
	<div class="entity-body">
		<? if ($object->excerpt) : ?>
	    <?= @helper('text.truncate', @escape($object->excerpt), array('length' => 200)); ?>
		<? else : ?>
		<? $body = @content($object->body, array('exclude' => 'gist')); ?>
	    <?= @helper('text.truncate', $body, array('length' => 200, 'read_more' => true, 'consider_html' => true)); ?>
		<? endif; ?>
	</div>
</data>

<? if ($type === 'notification') :?>
<? $commands->insert('viewcomment', array('label' => @text('LIB-AN-VIEW-COMMENT')))->href($object->getURL().'&permalink='.$comment->id)?>
<data name="email_body">
    <h4 class="entity-title">
    	<?= @link($object) ?>
    </h4>
    <div class="entity-body">
	    <?= nl2br($comment->body) ?>
	</div>
</data>
<? endif;?>
