select * from stu_tbl ;

desc save_tbl;
use modeldb;
delete from save_tbl where fk_sub_name = "자료구조";

select fk_adm_year, semester, avg(score) from save_tbl group by fk_adm_year, semester order by fk_adm_year desc, semester desc;

select fk_adm_year, avg(score) from save_tbl group by fk_adm_year;


delete from save_tbl;

select fk_adm_year, avg(score) from save_tbl group by semester, fk_adm_year;

SELECT fk_sub_name, fk_adm_year, semester, score, pnp FROM save_tbl;

set foreign_key_checks = 0;
select * from save_tbl;
select * from grad_credit_tbl;
select * from sub_tbl;
alter table save_tbl change pnp pnp varchar(5) null;
desc save_tbl;
select * from grad_credit_tbl;
INSERT INTO `modeldb`.`sub_tbl` (`sub_name`, `credit_num`, `class_type`, `appli_grade`) VALUES ('운영체제', '3', '전필', '2');
select * from sylla_tbl;

select fk_adm_year, semester, avg(score) from save_tbl group by fk_adm_year, semester;
 
select avg(score) avg(score)*)from save_tbl group by fk_adm_year order by fk_adm_year desc;

select class_type, sum(credit_num) from sub_tbl group by class_type;

select sum(credit_num), lib_arts
from save_tbl 
inner join sub_tbl on save_tbl.fk_sub_name = sub_tbl.sub_name 
inner join stu_tbl on save_tbl.fk_stu_id = stu_tbl.stu_id
inner join grad_credit_tbl on left(stu_tbl.stu_num, 4) = grad_credit_tbl.adm_year
where sub_tbl.class_type not in ('학부공통', '전선', '전필' ) && save_tbl.fk_stu_id = 'kku1';

select * from grad_credit_tbl;

desc save_tbl;


select * from save_tbl;
select * from sub_tbl;
select * from gr;

select * from save_tbl
inner join sub_tbl on save_tbl.fk_sub_name = sub_tbl.sub_name
where save_tbl.fk_stu_id = 'kku1' ;

select * from sub_tbl where class_type = "전선";

select adm_year, class_type, sum(credit_num), lib_arts, com_fac, maj_req, maj_sel
from save_tbl 
inner join sub_tbl on save_tbl.fk_sub_name = sub_tbl.sub_name 
inner join stu_tbl on save_tbl.fk_stu_id = stu_tbl.stu_id
inner join grad_credit_tbl on left(stu_tbl.stu_num, 4) = grad_credit_tbl.adm_year
where save_tbl.fk_stu_id = 'kku1';
select * from save_tbl;

SELECT * FROM save_tbl
          INNER JOIN sub_tbl ON save_tbl.fk_sub_name = sub_tbl.sub_name
          INNER JOIN stu_tbl ON save_tbl.fk_stu_id = stu_tbl.stu_id
          INNER JOIN grad_credit_tbl on left(stu_tbl.stu_num, 4) = grad_credit_tbl.adm_year
          WHERE save_tbl.fk_stu_id = "kku1";
          
          
SELECT sum(credit_num), lib_arts FROM save_tbl
         INNER JOIN sub_tbl ON save_tbl.fk_sub_name = sub_tbl.sub_name
         INNER JOIN stu_tbl ON save_tbl.fk_stu_id = stu_tbl.stu_id
         INNER JOIN grad_credit_tbl ON left(stu_tbl.stu_num, 4) = grad_credit_tbl.adm_year
         WHERE sub_tbl.class_type NOT IN ('학부공통', '전선', '전필' ) && save_tbl.fk_stu_id = "kku1";
         
SELECT fk_adm_year, avg(score) FROM save_t  WHERE save_tbl.fk_stu_id = "kku12" GROUP BY fk_adm_year ORDER BY fk_adm_year DESC;
select * from sub_tbl;
select * from sylla_tbl;
select * from stu_tbl;
use modelDB;

select * from save_tbl;

SELECT sub_name, credit_num, appli_grade, class_type FROM sub_tbl
INNER JOIN sylla_tbl ON sub_tbl.sub_name = sylla_tbl.fk_sub_name
INNER JOIN stu_tbl ON sylla_tbl.sylla_year = LEFT(stu_tbl.stu_num, 4)
WHERE stu_id = "kku1"  AND class_type NOT IN ('전선', '전필', '학부공통') 
AND sub_name NOT IN (SELECT fk_sub_name FROM save_tbl WHERE fk_stu_id = "kku1");

select sub_name, alt_sub from sub_tbl where alt_sub not in('');

SELECT sub_name, credit_num, appli_grade, class_type FROM sub_tbl
INNER JOIN sylla_tbl ON sub_tbl.sub_name = sylla_tbl.fk_sub_name
INNER JOIN stu_tbl ON sylla_tbl.sylla_year = LEFT(stu_tbl.stu_num, 4)
WHERE stu_id = "kku1"  AND class_type NOT IN ('전선', '전필', '학부공통')
AND sub_name NOT IN (SELECT fk_sub_name FROM save_tbl WHERE fk_stu_id = "kku1");
