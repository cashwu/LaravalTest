CREATE TABLE if NOT EXISTS student (

  `id` int AUTO_INCREMENT PRIMARY KEY,

  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',

  `age` tinyint NOT NULL DEFAULT 0 COMMENT '年齡',

  `sex` tinyint NOT NULL DEFAULT 10 COMMENT '性別',

  `create_at` int NOT NULL DEFAULT 0 COMMENT '新增時間',

  `update_at` int NOT NULL DEFAULT 0 COMMENT '修改時間'

) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1001 COMMENT="學生表";