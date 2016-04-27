
BEGIN;

-----------------------------------------------------------------------
-- user
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "user" CASCADE;

CREATE TABLE "user"
(
    "id" serial NOT NULL,
    "email" VARCHAR(64) NOT NULL,
    "name" VARCHAR(64),
    "portrait" VARCHAR(1024),
    "age" INTEGER,
    "password" VARCHAR(32),
    "created" TIMESTAMP NOT NULL,
    "updated" TIMESTAMP NOT NULL,
    "removed" TIMESTAMP,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id"),
    CONSTRAINT "user_u_8e63fd" UNIQUE ("id","id")
);

COMMENT ON TABLE "user" IS '用户表';

COMMENT ON COLUMN "user"."email" IS '用户的Email，也是登录名';

COMMENT ON COLUMN "user"."name" IS '用户姓名';

COMMENT ON COLUMN "user"."portrait" IS '用户头像';

COMMENT ON COLUMN "user"."age" IS '用户的年龄';

COMMENT ON COLUMN "user"."password" IS '登录密码';

COMMENT ON COLUMN "user"."created" IS '用户的注册时间';

COMMENT ON COLUMN "user"."updated" IS '用户的更新时间';

COMMENT ON COLUMN "user"."removed" IS '用户的删除时间';

-----------------------------------------------------------------------
-- tech
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "tech" CASCADE;

CREATE TABLE "tech"
(
    "id" serial NOT NULL,
    "label" VARCHAR(32) NOT NULL,
    "description" VARCHAR(256),
    "url" VARCHAR(1024),
    "hot" INTEGER NOT NULL,
    "created" TIMESTAMP NOT NULL,
    "updated" TIMESTAMP NOT NULL,
    "removed" TIMESTAMP,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

COMMENT ON TABLE "tech" IS '技术表';

COMMENT ON COLUMN "tech"."label" IS '技术的标签名';

COMMENT ON COLUMN "tech"."description" IS '描述信息';

COMMENT ON COLUMN "tech"."url" IS '指向该技术的官方网站';

COMMENT ON COLUMN "tech"."hot" IS '技术的热度';

COMMENT ON COLUMN "tech"."created" IS '技术的创建时间';

COMMENT ON COLUMN "tech"."updated" IS '技术的更新时间';

COMMENT ON COLUMN "tech"."removed" IS '技术的删除时间';

-----------------------------------------------------------------------
-- category
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "category" CASCADE;

CREATE TABLE "category"
(
    "id" serial NOT NULL,
    "label" VARCHAR(32) NOT NULL,
    "created" TIMESTAMP NOT NULL,
    "updated" TIMESTAMP NOT NULL,
    "removed" TIMESTAMP,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

COMMENT ON TABLE "category" IS '分类表';

COMMENT ON COLUMN "category"."label" IS '分类名';

COMMENT ON COLUMN "category"."created" IS '分类的创建时间';

COMMENT ON COLUMN "category"."updated" IS '分类的更新时间';

COMMENT ON COLUMN "category"."removed" IS '分类的删除时间';

-----------------------------------------------------------------------
-- task
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "task" CASCADE;

CREATE TABLE "task"
(
    "id" serial NOT NULL,
    "title" VARCHAR(64) NOT NULL,
    "description" VARCHAR(256) NOT NULL,
    "requirement" VARCHAR(128) NOT NULL,
    "min_price" INTEGER NOT NULL,
    "max_price" INTEGER NOT NULL,
    "needed" INTEGER NOT NULL,
    "creator_id" INTEGER NOT NULL,
    "cat_id" INTEGER NOT NULL,
    "created" TIMESTAMP NOT NULL,
    "updated" TIMESTAMP NOT NULL,
    "removed" TIMESTAMP,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

COMMENT ON TABLE "task" IS '任务表';

COMMENT ON COLUMN "task"."title" IS '任务的标题';

COMMENT ON COLUMN "task"."description" IS '任务的描述';

COMMENT ON COLUMN "task"."requirement" IS '任务的需求';

COMMENT ON COLUMN "task"."min_price" IS '任务的最小报价';

COMMENT ON COLUMN "task"."max_price" IS '任务的最大报价';

COMMENT ON COLUMN "task"."needed" IS '工期，单位为小时';

COMMENT ON COLUMN "task"."creator_id" IS '任务的发起者';

COMMENT ON COLUMN "task"."cat_id" IS '任务的分类';

COMMENT ON COLUMN "task"."created" IS '任务的创建时间';

COMMENT ON COLUMN "task"."updated" IS '任务的最新修改时间';

COMMENT ON COLUMN "task"."removed" IS '任务的删除时间';

-----------------------------------------------------------------------
-- bidding
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "bidding" CASCADE;

CREATE TABLE "bidding"
(
    "id" serial NOT NULL,
    "task_id" INTEGER NOT NULL,
    "user_id" INTEGER NOT NULL,
    "price" INTEGER NOT NULL,
    "needed" INTEGER NOT NULL,
    "message" VARCHAR(256) NOT NULL,
    "status" VARCHAR NOT NULL,
    "created" TIMESTAMP NOT NULL,
    "updated" TIMESTAMP NOT NULL,
    "removed" TIMESTAMP,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

COMMENT ON TABLE "bidding" IS '竞价表';

COMMENT ON COLUMN "bidding"."task_id" IS '任务ID';

COMMENT ON COLUMN "bidding"."user_id" IS '发起竞价的用户ID';

COMMENT ON COLUMN "bidding"."price" IS '价格';

COMMENT ON COLUMN "bidding"."needed" IS '需要的工期,单位小时';

COMMENT ON COLUMN "bidding"."message" IS '留言';

COMMENT ON COLUMN "bidding"."status" IS '竞价状态，init|preorder|ordered';

-----------------------------------------------------------------------
-- order
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "order" CASCADE;

CREATE TABLE "order"
(
    "order_id" serial NOT NULL,
    "task_id" INTEGER NOT NULL,
    "amount" INTEGER NOT NULL,
    "boss_id" INTEGER NOT NULL,
    "worker_id" INTEGER NOT NULL,
    "progress" INTEGER NOT NULL,
    "worker_deposit" INTEGER,
    "boss_deposit" INTEGER,
    "done" TIMESTAMP NOT NULL,
    "status" VARCHAR NOT NULL,
    "created" TIMESTAMP NOT NULL,
    "updated" TIMESTAMP NOT NULL,
    "removed" TIMESTAMP,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("order_id")
);

COMMENT ON TABLE "order" IS '订单表';

COMMENT ON COLUMN "order"."task_id" IS '任务ID';

COMMENT ON COLUMN "order"."amount" IS '最终的支付金额';

COMMENT ON COLUMN "order"."boss_id" IS '发起这个任务的用户ID';

COMMENT ON COLUMN "order"."worker_id" IS '接单的用户ID';

COMMENT ON COLUMN "order"."progress" IS '任务的进度';

COMMENT ON COLUMN "order"."worker_deposit" IS '接单用户提交的订金';

COMMENT ON COLUMN "order"."boss_deposit" IS '发单用户提交的订金';

COMMENT ON COLUMN "order"."done" IS '交付时间';

COMMENT ON COLUMN "order"."status" IS '状态, init|boss_promise|worker_promise|doing|test|done|exception';

COMMENT ON COLUMN "order"."created" IS '订单的创建时间';

COMMENT ON COLUMN "order"."updated" IS '订单的最新修改时间';

COMMENT ON COLUMN "order"."removed" IS '订单的删除时间';

-----------------------------------------------------------------------
-- task_tech
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "task_tech" CASCADE;

CREATE TABLE "task_tech"
(
    "task_id" VARCHAR NOT NULL,
    "tech_id" VARCHAR NOT NULL,
    PRIMARY KEY ("task_id","tech_id")
);

COMMENT ON TABLE "task_tech" IS '任务-技术关联表';

ALTER TABLE "task" ADD CONSTRAINT "task_fk_7a25b2"
    FOREIGN KEY ("creator_id")
    REFERENCES "user" ("id");

ALTER TABLE "task" ADD CONSTRAINT "task_fk_288d00"
    FOREIGN KEY ("cat_id")
    REFERENCES "category" ("id");

ALTER TABLE "bidding" ADD CONSTRAINT "bidding_fk_031dc6"
    FOREIGN KEY ("task_id")
    REFERENCES "task" ("id");

ALTER TABLE "bidding" ADD CONSTRAINT "bidding_fk_29554a"
    FOREIGN KEY ("user_id")
    REFERENCES "user" ("id");

ALTER TABLE "order" ADD CONSTRAINT "order_fk_031dc6"
    FOREIGN KEY ("task_id")
    REFERENCES "task" ("id");

ALTER TABLE "order" ADD CONSTRAINT "order_fk_725121"
    FOREIGN KEY ("boss_id","worker_id")
    REFERENCES "user" ("id","id");

ALTER TABLE "task_tech" ADD CONSTRAINT "task_tech_fk_031dc6"
    FOREIGN KEY ("task_id")
    REFERENCES "task" ("id");

ALTER TABLE "task_tech" ADD CONSTRAINT "task_tech_fk_2ee559"
    FOREIGN KEY ("tech_id")
    REFERENCES "tech" ("id");

COMMIT;
