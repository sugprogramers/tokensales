INSERT INTO c_user(
            c_user_id, isactive, created, createdby, updated, updatedby, 
            password, phone, firstname, lastname, birthday, address1, 
            address2, c_country_id, c_region_id, city, postal, usertype, 
            email, registertoken, tokenexpirationdate, status)
    VALUES ('100', 'Y', DATE(NOW()), '100', DATE(NOW()), '100', 
            'admin', '', 'SMART DEVELOPER', '', DATE(NOW()), 'Address1 #123 Street', 
            '', '100', '103', '', '', 'ADM', 
            'admin@gmail.com', '', DATE(NOW()), '');


INSERT INTO c_user(
            c_user_id, isactive, created, createdby, updated, updatedby, 
            password, phone, firstname, lastname, birthday, address1, 
            address2, c_country_id, c_region_id, city, postal, usertype, 
            email, registertoken, tokenexpirationdate, status)
    VALUES ('101', 'Y', DATE(NOW()), '100', DATE(NOW()), '100', 
            '123456', '', 'SMART DEVELOPER', '', DATE(NOW()), 'Address1 #123 Street', 
            '', '100', '103', '', '', 'INV', 
            'investor@gmail.com', '', DATE(NOW()), '');

INSERT INTO c_user(
            c_user_id, isactive, created, createdby, updated, updatedby, 
            password, phone, firstname, lastname, birthday, address1, 
            address2, c_country_id, c_region_id, city, postal, usertype, 
            email, registertoken, tokenexpirationdate, status)
    VALUES ('102', 'Y', DATE(NOW()), '100', DATE(NOW()), '100', 
            '123456', '', 'SMART DEVELOPER', '', DATE(NOW()), 'Address1 #123 Street', 
            '', '100', '103', '', '', 'COMPMAN', 
            'company@gmail.com', '', DATE(NOW()), '');
