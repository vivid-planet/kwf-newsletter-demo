<?=trlKwf('You got a requst on {0}', $this->host);?>.


<?=trlKwf('Enquiry');?>:
<?= $this->content; ?>


<?=trlKwf('This enquiry was sent by');?>:

<?=trlKwf('Name');?>: <?= $this->firstname; ?> <?= $this->lastname; ?>

<?=trlKwf('Email');?>: <?= $this->email; ?>

<?=trlKwf('Organisation');?>: <?= $this->organisation; ?>

<?=trlKwf('Street');?>: <?= $this->street; ?>

<?=trlKwf('ZIP / City');?>: <?= $this->city; ?>

<?=trlKwf('Phone');?>: <?= $this->phone; ?>
