<?php

//de fiecare data cand folosesc session trebuie sa ii dau resume sau sa o pornesc
session_start();

session_destroy();

header("Location: index.php");
exit;

