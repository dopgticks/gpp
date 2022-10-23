CREATE TABLE `course_video`(
    `id` int primary key auto_increment,
    `course_id` int,
    `path` varchar(255),
    `desc` varchar(500),
    `date_added` date,
    constraint `cid` foreign key(course_id) references course(id) on delete cascade on update no action
    

);