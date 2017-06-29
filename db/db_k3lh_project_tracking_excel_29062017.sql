insert into auth_item (name, type) values
('project-tracking-export', 1);

insert auth_item_child (parent, child) values
('project-tracking', 'project-tracking-export');