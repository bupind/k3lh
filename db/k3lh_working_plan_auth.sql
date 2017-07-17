insert into auth_item (name, type) values
('working-plan-export', 1);

insert auth_item_child (parent, child) values
('rencana-kerja', 'working-plan-export');