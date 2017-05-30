insert into auth_item (name, type) values
('roadmap-k3l-export', 1);

insert auth_item_child (parent, child) values
('roadmap-k3l-kitsbs', 'roadmap-k3l-export');