INSERT INTO c_user(
            c_user_id, isactive, created, createdby, updated, updatedby, 
            password, phone, firstname, lastname, birthday, address1, 
            address2, c_country_id, c_region_id, city, postal, usertype, 
            email, registertoken, tokenexpirationdate, status)
    VALUES ('100', 'Y', CURRENT_TIMESTAMP, '100', CURRENT_TIMESTAMP, '100', 
            'admin', '', 'ADMINASTRODOR', '', CURRENT_TIMESTAMP, 'Address1 #123 Street', 
            '', '100', '103', '', '', 'ADM', 
            'admin@gmail.com', '', CURRENT_TIMESTAMP, 'A');

INSERT INTO c_user(
            c_user_id, isactive, created, createdby, updated, updatedby, 
            password, phone, firstname, lastname, birthday, address1, 
            address2, c_country_id, c_region_id, city, postal, usertype, 
            email, registertoken, tokenexpirationdate, status)
    VALUES ('101', 'Y', CURRENT_TIMESTAMP, '100', CURRENT_TIMESTAMP, '100', 
            '123456', '', 'CUSTOMER', '', CURRENT_TIMESTAMP, 'Address1 #123 Street', 
            '', '100', '103', '', '', 'CUSTOMER', 
            'customer@gmail.com', '', CURRENT_TIMESTAMP, 'A');