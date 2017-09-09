insert into auth_item (name, type) values
('ppa-export', 1),
('ppa-ba-export', 1);

insert auth_item_child (parent, child) values
('pengendalian-pencemaran-air', 'ppa-export'),
('pengendalian-pencemaran-air', 'ppa-ba-export');