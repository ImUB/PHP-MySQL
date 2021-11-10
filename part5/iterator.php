<?php
  require_once 'memberclass.php';
  require_once 'membersclass.php';

  $member1 = new Member(1, "성1", "이름1", "email1@abrequabc.com", "pass1");
  $member2 = new Member(2, "성2", "이름2", "email2@abrequabc.com", "pass2");
  $member3 = new Member(3, "성3", "이름3", "email3@abrequabc.com", "pass3");
  $member4 = new Member(4, "성4", "이름4", "email4@abrequabc.com", "pass4");
  $member5 = new Member(5, "성5", "이름5", "email5@abrequabc.com", "pass5");

  $members = new Members;
  $members->add($member1);
  $members->add($member2);
  $members->add($member3);
  $members->add($member4);
  $members->add($member5);

  $iterator = $members->getiterator();

  foreach ($iterator as $member) {
    print $member->getId()." ";
    print $member->getLastname()." ";
    print $member->getFirstname()." ";
    print $member->getEmail()." ";
    print $member->getPassword()."<br>";
  }

?>
