insert into Nutrition values('Meat',143,'100 gram has 143 calories, 200 gram per day');
insert into Nutrition values('beans',347,'100 gram has 347 calories, 100 gram per day');
insert into Nutrition values('baked potato',93,'100 gram has 93 calories, 100 gram per day');
insert into Nutrition values('milk',42,'100 gram has 42 calories, 100 gram per day');
insert into Nutrition values('egg',78,'1 egg has 78 calories, 2 eggs per day');


insert into Diet_Plan values(0000001,'Intermittent fasting','5 weeks','weight loss');
insert into Diet_Plan values(0000002,'low carb diet','3 weeks','weight loss');
insert into Diet_Plan values(0000003,'whole eggs and yogurts','3 weeks','weight gain');

insert into equipment values('treadmill','do for at least 50 minutes');
insert into equipment values('upright bike','do for at least 50 minutes');
insert into equipment values('rowing machine','do 3 reps of 20');
insert into equipment values('elliptical machine','do for at least 50 minutes');
insert into equipment values('leg press','at least 3 reps of 10');
insert into equipment values('Leg extension machine','do at least 3 reps of 20');
insert into equipment values('pulldown machine','at least 3 reps of 10');
insert into equipment values('Pec deck machine','at least 3 reps of 15');
insert into equipment values('Ab crunch machine','do at least 3 reps of 15');
insert into equipment values('hanging rod','do at least 3 reps of 10');


insert into Exercise values('cardio',7,'treadmill,upright bike,leg press,Leg extension machine','2:00:00');
insert into Exercise values('cable crossover',2,'Ab crunch machine','00:20:00');
insert into Exercise values('pullups',2,'hanging rod','00:10:00');

insert into Muscle_group values('legs','do cardio and squats for legs','cardio');
insert into Muscle_group values('chest','do cable crossover and pec dec machine for chest ','cable crossover');
insert into Muscle_group values('biceps','do pull ups as much as you can do','pullups');

insert into nutrient_diet values(0000001,40,'Meat');
insert into nutrient_diet values(0000002,20,'beans');
insert into nutrient_diet values(0000003,30,'baked potato');
insert into nutrient_diet values(0000002,60,'milk');
insert into nutrient_diet values(0000001,40,'egg');

insert into workout_plan values(1,'cardio',000001, 23, 'male','weight loss',26);
insert into workout_plan values(2,'cable crossover',000002, 34, 'male','weight loss',28);
insert into workout_plan values(3,'pullups',000003, 24, 'female','weight gain',17);

insert into muscle_workout values(1,'legs',1,'02:00:00');
insert into muscle_workout values(2,'chest',3, '00:20:00');
insert into muscle_workout values(3,'biceps',4, '00:20:00');

insert into Member values(01,'musawyne',1,'musa',23,'male');
insert into Member values(02,'ahmadarif_1',1,'ahmad',34,'male');
insert into Member values(03,'ayesha_kamran',2,'ayesha',24,'female');

insert into Log values(11111,01,89,78,26,91,75,'24-Jan-2021');
insert into Log values(22222,02,76,89,28,84,80,'14-May-2020');
insert into Log values(33333,03,94,100,17,69,64,'22-Apr-2019');

