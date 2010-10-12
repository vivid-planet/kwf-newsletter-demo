<?=trlVps('You got a requst on {0}', $this->host);?>.


<?=trlVps('Enquiry');?>:
<?= $this->content; ?>


<?=trlVps('This enquiry was sent by');?>:

<?=trlVps('Name');?>: <?= $this->firstname; ?> <?= $this->lastname; ?>

<?=trlVps('Email');?>: <?= $this->email; ?>

<?=trlVps('Organisation');?>: <?= $this->organisation; ?>

<?=trlVps('Street');?>: <?= $this->street; ?>

<?=trlVps('ZIP / City');?>: <?= $this->city; ?>

<?=trlVps('Phone');?>: <?= $this->phone; ?>
