<?php
$error = false;
$class = null;
$message = null;
$type = 'msgbox';

if (!empty($_POST)) {
    if (isset($_POST['type'])) {
        if ($_POST['type'] == 'comment') {
            if (empty($_POST['articleid'])) {
                $error = true;
                $message = 'L\'article que tu essayes de commenter n\'existe pas ou plus.';
            } else {
				
					$articleid = $_POST['articleid'];
                    $comment = trim(htmlspecialchars($_POST['articlecomment']));
				
                if (empty($comment)) {
                    $error = true;
                    $message = 'Merci de remplir les champs vides.';
                } else {
                  
                    $query = $db->connect()->prepare('SELECT * FROM site_news WHERE id = ?');
                    $query->execute([$articleid]);

                    $fetch = $query->fetchAll();

                    if (count($fetch) < 1) {
                        $error = true;
                        $message = 'L\'article que tu essayes de commenter n\'existe pas ou plus.';
                    } else {
                        if (!$user->isOnline()) {
                            $error = true;
                            $message = 'Il faut que tu sois connecté pour faire ça.';
                        } else {
                            $query3 = $db->connect()->prepare('SELECT * FROM site_news_comments WHERE newsid = ? ORDER BY id DESC');
                            $query3->execute([$articleid]);

                            $fetch3 = $query3->fetchAll();

                            if ($fetch3[0]['uid'] == $user->get('id')) {
                                $error = true;
                                $message = 'Merci d\'attendre qu\'un autre joueur poste un message avant toi.';
                            } else {
								
								if($check->antipub($comment))
								{
									$error = true;
									$message = 'Ta phrase contient de la publicité pour un site interdit.';
									
								} else {
									
									$query267 = $db->connect()->prepare('INSERT INTO site_news_comments(newsid, uid, comment, posted) VALUES(?, ?, ?, ?)');
									$query267->execute([$articleid, $user->get('id'), $comment, TIME]);
								}
                            

                            }
                        }
                    }
                }
            }
        }
    } else {
        $error = true;
        $message = 'L\'action que tu cherches à faire n\'est plus disponible.';
    }
}
?>