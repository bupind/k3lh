ALTER TABLE plb3_sa_company_profile
ADD `profile_main_office_phone_fax_test` varchar(100) DEFAULT NULL AFTER `profile_main_office_address`;

insert into auth_item (name, type) values
('plb3-self-assessment-export', 1);

insert auth_item_child (parent, child) values
('plb3-self-assessment', 'plb3-self-assessment-export');