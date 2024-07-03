SELECT l.id, l.title, l.description, l.price_per_night, l.nb_room, l.nb_bed, l.nb_bath, l.nb_traveler, l.is_active, tl.label
      FROM logement AS l           
      INNER JOIN typelogement AS tl on l.`type_logement_id` = tl.`id`
      WHERE l.`is_active` = 1 LIMIT 100;



SELECT l.id, l.title, l.description, l.price_per_night, l.nb_room, l.nb_bed, l.nb_bath, l.nb_traveler, l.is_active, m.image_path
      FROM logement AS l           
      INNER JOIN media AS m ON l.`id` = m.`logement_id`
      WHERE l.`is_active` = 1 ;

SELECT l.id, l.title, l.price_per_night, m.image_path
 FROM logement AS l
 INNER JOIN media  AS m ON l.`id` = m.`logement_id`
  WHERE l.`is_active` = 1 ;



  SELECT tl.label, tl.image_path,l.title, l.description, l.price_per_night, l.nb_room, l.nb_bed, l.nb_bath, l.nb_traveler
  FROM type_logement AS tl
  INNER JOIN logement AS l ON tl.id = l.type_logement_id;


  SELECT *
            FROM reservation
            WHERE `user_id` = 12 ;



SELECT *
      FROM equipement
      WHERE `logement_id` = :id_logement;