
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(64) NOT NULL COMMENT '用户的Email，也是登录名',
    `name` VARCHAR(64) COMMENT '用户姓名',
    `portrait` VARCHAR(1024) COMMENT '用户头像',
    `age` INTEGER COMMENT '用户的年龄',
    `password` VARCHAR(32) COMMENT '登录密码',
    `created` DATETIME NOT NULL COMMENT '用户的注册时间',
    `updated` DATETIME NOT NULL COMMENT '用户的更新时间',
    `removed` DATETIME COMMENT '用户的删除时间',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT='用户表';

-- ---------------------------------------------------------------------
-- tech
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tech`;

CREATE TABLE `tech`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `label` VARCHAR(32) NOT NULL COMMENT '技术的标签名',
    `description` VARCHAR(256) COMMENT '描述信息',
    `url` VARCHAR(1024) COMMENT '指向该技术的官方网站',
    `hot` INTEGER NOT NULL COMMENT '技术的热度',
    `created` DATETIME NOT NULL COMMENT '技术的创建时间',
    `updated` DATETIME NOT NULL COMMENT '技术的更新时间',
    `removed` DATETIME COMMENT '技术的删除时间',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT='技术表';

-- ---------------------------------------------------------------------
-- category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `label` VARCHAR(32) NOT NULL COMMENT '分类名',
    `created` DATETIME NOT NULL COMMENT '分类的创建时间',
    `updated` DATETIME NOT NULL COMMENT '分类的更新时间',
    `removed` DATETIME COMMENT '分类的删除时间',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT='分类表';

-- ---------------------------------------------------------------------
-- task
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(64) NOT NULL COMMENT '任务的标题',
    `description` VARCHAR(256) NOT NULL COMMENT '任务的描述',
    `requirement` VARCHAR(128) NOT NULL COMMENT '任务的需求',
    `min_price` INTEGER NOT NULL COMMENT '任务的最小报价',
    `max_price` INTEGER NOT NULL COMMENT '任务的最大报价',
    `needed` INTEGER NOT NULL COMMENT '工期，单位为小时',
    `creator_id` INTEGER NOT NULL COMMENT '任务的发起者',
    `cat_id` INTEGER NOT NULL COMMENT '任务的分类',
    `created` DATETIME NOT NULL COMMENT '任务的创建时间',
    `updated` DATETIME NOT NULL COMMENT '任务的最新修改时间',
    `removed` DATETIME COMMENT '任务的删除时间',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `task_fi_7a25b2` (`creator_id`),
    INDEX `task_fi_288d00` (`cat_id`),
    CONSTRAINT `task_fk_7a25b2`
        FOREIGN KEY (`creator_id`)
        REFERENCES `user` (`id`),
    CONSTRAINT `task_fk_288d00`
        FOREIGN KEY (`cat_id`)
        REFERENCES `category` (`id`)
) ENGINE=InnoDB COMMENT='任务表';

-- ---------------------------------------------------------------------
-- bidding
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bidding`;

CREATE TABLE `bidding`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `task_id` INTEGER NOT NULL COMMENT '任务ID',
    `user_id` INTEGER NOT NULL COMMENT '发起竞价的用户ID',
    `price` INTEGER NOT NULL COMMENT '价格',
    `needed` INTEGER NOT NULL COMMENT '需要的工期,单位小时',
    `message` VARCHAR(256) NOT NULL COMMENT '留言',
    `status` VARCHAR(255) NOT NULL COMMENT '竞价状态，init|preorder|ordered',
    `created` DATETIME NOT NULL,
    `updated` DATETIME NOT NULL,
    `removed` DATETIME,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `bidding_fi_031dc6` (`task_id`),
    INDEX `bidding_fi_29554a` (`user_id`),
    CONSTRAINT `bidding_fk_031dc6`
        FOREIGN KEY (`task_id`)
        REFERENCES `task` (`id`),
    CONSTRAINT `bidding_fk_29554a`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`)
) ENGINE=InnoDB COMMENT='竞价表';

-- ---------------------------------------------------------------------
-- order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order`
(
    `order_id` INTEGER NOT NULL AUTO_INCREMENT,
    `task_id` INTEGER NOT NULL COMMENT '任务ID',
    `amount` INTEGER NOT NULL COMMENT '最终的支付金额',
    `boss_id` INTEGER NOT NULL COMMENT '发起这个任务的用户ID',
    `worker_id` INTEGER NOT NULL COMMENT '接单的用户ID',
    `progress` INTEGER NOT NULL COMMENT '任务的进度',
    `worker_deposit` INTEGER COMMENT '接单用户提交的订金',
    `boss_deposit` INTEGER COMMENT '发单用户提交的订金',
    `done` DATETIME NOT NULL COMMENT '交付时间',
    `status` VARCHAR(255) NOT NULL COMMENT '状态, init|boss_promise|worker_promise|doing|test|done|exception',
    `created` DATETIME NOT NULL COMMENT '订单的创建时间',
    `updated` DATETIME NOT NULL COMMENT '订单的最新修改时间',
    `removed` DATETIME COMMENT '订单的删除时间',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`order_id`),
    INDEX `order_fi_031dc6` (`task_id`),
    INDEX `order_fi_725121` (`boss_id`, `worker_id`),
    CONSTRAINT `order_fk_031dc6`
        FOREIGN KEY (`task_id`)
        REFERENCES `task` (`id`),
    CONSTRAINT `order_fk_725121`
        FOREIGN KEY (`boss_id`,`worker_id`)
        REFERENCES `user` (`id`,`id`)
) ENGINE=InnoDB COMMENT='订单表';

-- ---------------------------------------------------------------------
-- task_tech
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `task_tech`;

CREATE TABLE `task_tech`
(
    `task_id` VARCHAR(255) NOT NULL,
    `tech_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`task_id`,`tech_id`),
    INDEX `task_tech_fi_2ee559` (`tech_id`),
    CONSTRAINT `task_tech_fk_031dc6`
        FOREIGN KEY (`task_id`)
        REFERENCES `task` (`id`),
    CONSTRAINT `task_tech_fk_2ee559`
        FOREIGN KEY (`tech_id`)
        REFERENCES `tech` (`id`)
) ENGINE=InnoDB COMMENT='任务-技术关联表';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
