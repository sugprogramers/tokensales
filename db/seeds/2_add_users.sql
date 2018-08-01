INSERT INTO c_user(
            c_user_id, isactive, created, createdby, updated, updatedby, 
            username, password, phone, firstname, lastname, birthday, address1, 
            address2, c_country_id, c_region_id, city, postal, usertype, 
            email, registertoken, tokenexpirationdate, status)
    VALUES ('100', 'Y', NOW(), '100', NOW(), '100', 
            'admin', 'admin', '', '', '', NOW(), '', 
            '', '100', '103', '', '', 'ADM', 
            'admin@gmail.com', '', NOW(), '');
