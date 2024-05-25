<?php
session_start();
session_destroy();
echo "<script>alert('Berhasil logout dari BIDANKU!'); window.location='../index.php';</script>";