<?php
            $photo_1_query = $db->connect()->prepare('SELECT * FROM camera_web WHERE timestamp < ? ORDER BY id DESC LIMIT 1');
            $photo_1_query->execute([time()]);
            $fetch1 = $photo_1_query->fetch();
            $photo_1_username = $user->get('username', $fetch1['user_id']);
            $photo_1_avatar = $user->get('look', $fetch1['user_id']);
            $photo_1_url = $fetch1['url'];

            $photo_2_query = $db->connect()->prepare('SELECT * FROM camera_web WHERE timestamp < ? ORDER BY id DESC LIMIT 1,2');
            $photo_2_query->execute([time()]);
            $fetch2 = $photo_2_query->fetch();
            $photo_2_username = $user->get('username', $fetch2['user_id']);
            $photo_2_avatar = $user->get('look', $fetch2['user_id']);
            $photo_2_url = $fetch2['url'];

            $photo_3_query = $db->connect()->prepare('SELECT * FROM camera_web WHERE timestamp < ? ORDER BY id DESC LIMIT 2,3');
            $photo_3_query->execute([time()]);
            $fetch3 = $photo_3_query->fetch();
            $photo_3_username = $user->get('username', $fetch3['user_id']);
            $photo_3_avatar = $user->get('look', $fetch3['user_id']);
            $photo_3_url = $fetch3['url'];

            $photo_4_query = $db->connect()->prepare('SELECT * FROM camera_web WHERE timestamp < ? ORDER BY id DESC LIMIT 3,4');
            $photo_4_query->execute([time()]);
            $fetch4 = $photo_4_query->fetch();
            $photo_4_username = $user->get('username', $fetch4['user_id']);
            $photo_4_avatar = $user->get('look', $fetch4['user_id']);
            $photo_4_url = $fetch4['url'];

            $photo_5_query = $db->connect()->prepare('SELECT * FROM camera_web WHERE timestamp < ? ORDER BY id DESC LIMIT 4,5');
            $photo_5_query->execute([time()]);
            $fetch5 = $photo_5_query->fetch();
            $photo_5_username = $user->get('username', $fetch5['user_id']);
            $photo_5_avatar = $user->get('look', $fetch5['user_id']);
            $photo_5_url = $fetch5['url'];

            $photo_6_query = $db->connect()->prepare('SELECT * FROM camera_web WHERE timestamp < ? ORDER BY id DESC LIMIT 5,6');
            $photo_6_query->execute([time()]);
            $fetch6 = $photo_6_query->fetch();
            $photo_6_username = $user->get('username', $fetch6['user_id']);
            $photo_6_avatar = $user->get('look', $fetch6['user_id']);
            $photo_6_url = $fetch6['url'];
 ?>