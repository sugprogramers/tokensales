INSERT INTO c_user(
            c_user_id, isactive, created, createdby, updated, updatedby, 
            password, phone, firstname, lastname, birthday, address1, 
            address2, c_country_id, c_region_id, city, postal, usertype, 
            email, registertoken, tokenexpirationdate, status)
    VALUES ('100', 'Y', TO_DATE(NOW()), '100', TO_DATE(NOW()), '100', 
            'admin', '', '', '', TO_DATE(NOW()), '', 
            '', '100', '103', '', '', 'ADM', 
            'admin@gmail.com', '', TO_DATE(NOW()), '');
