insert into Nutrition values('Meat',143,'100 gram has 143 calories, 200 gram per day');
insert into Nutrition values('beans',347,'100 gram has 347 calories, 100 gram per day');
insert into Nutrition values('baked potato',93,'100 gram has 93 calories, 100 gram per day');
insert into Nutrition values('milk',42,'100 gram has 42 calories, 100 gram per day');
insert into Nutrition values('egg',78,'1 egg has 78 calories, 2 eggs per day');

insert into Diet_Plan values(0,'none','none','none');
insert into Diet_Plan values(1,'Intermittent fasting','week','loss');
insert into Diet_Plan values(2,'low carb diet','week','loss');
insert into Diet_Plan values(3,'weight gain','month','gain');

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


insert into Exercise values('cardio',7,'treadmill','2H');
insert into Exercise values('cable crossover',2,'Ab crunch machine','20M');
insert into Exercise values('pullups',2,'hanging rod','10M');

insert into Muscle_group values('legs','do cardio and squats for legs','cardio');
insert into Muscle_group values('biceps','do cable crossover and pec dec machine for chest ','cable crossover');
insert into Muscle_group values('chest','do pull ups as much as you can do','pullups');
insert into Muscle_group values('thighs','do squats for legs','cardio');
insert into Muscle_group values('triceps','do cable crossover and pec dec machine for chest ','cable crossover');
insert into Muscle_group values('shoulders','do pull ups as much as you can do','pullups');

insert into nutrient_diet values(1,1,'Meat');
insert into nutrient_diet values(1,2,'beans');
insert into nutrient_diet values(1,3,'baked potato');
insert into nutrient_diet values(1,4,'milk');
insert into nutrient_diet values(1,5,'egg');

insert into nutrient_diet values(2,1,'Meat');
insert into nutrient_diet values(2,2,'beans');
insert into nutrient_diet values(2,3,'baked potato');
insert into nutrient_diet values(2,4,'milk');
insert into nutrient_diet values(2,5,'egg');

insert into nutrient_diet values(3,1,'Meat');
insert into nutrient_diet values(3,2,'beans');
insert into nutrient_diet values(3,3,'baked potato');
insert into nutrient_diet values(3,4,'milk');
insert into nutrient_diet values(3,5,'egg');


insert into workout_plan values(0,'none',0, 0, 'none','none',0);
insert into workout_plan values(1,'cardio',1, 23, 'male','loss',26);
insert into workout_plan values(2,'cable crossover',2, 34, 'male','loss',28);
insert into workout_plan values(3,'pullups',3, 24, 'female','gain',17);

insert into muscle_workout values(1,'legs',1,'2H');
insert into muscle_workout values(1,'biceps',2,'2H');
insert into muscle_workout values(1,'chest',3, '20M');
insert into muscle_workout values(1,'thighs',4, '1H');
insert into muscle_workout values(1,'triceps',5, '40M');
insert into muscle_workout values(1,'shoulders',6, '30M');

insert into muscle_workout values(2,'biceps',1,'2H');
insert into muscle_workout values(2,'thighs',2,'2H');
insert into muscle_workout values(2,'shoulders',3, '20M');
insert into muscle_workout values(2,'legs',4, '1H');
insert into muscle_workout values(2,'chest',5, '40M');
insert into muscle_workout values(2,'triceps',6, '30M');

insert into muscle_workout values(3,'biceps',1,'2H');
insert into muscle_workout values(3,'thighs',2,'2H');
insert into muscle_workout values(3,'chest',3, '20M');
insert into muscle_workout values(3,'triceps',4, '1H');
insert into muscle_workout values(3,'legs',5, '40M');
insert into muscle_workout values(3,'shoulders',6, '30M');

insert into muscle_workout values(4,'thighs',1,'2H');
insert into muscle_workout values(4,'biceps',2,'2H');
insert into muscle_workout values(4,'shoulders',3, '20M');
insert into muscle_workout values(4,'chest',4, '1H');
insert into muscle_workout values(4,'legs',5, '40M');
insert into muscle_workout values(4,'triceps',6, '30M');


insert into Member(member_name, M_password, planID, member_type, Age, gender)values('Musa','musawyne',1,'user',23,'male');
insert into Member(member_name, M_password, planID, member_type, Age, gender) values('Ahmed','ahmadarif_1',1,'user',34,'male');
insert into Member(member_name, M_password, planID, member_type, Age, gender) values('Ayesha','ayesha_kamran',2,'trained',24,'female');

insert into Log(member_id, workout_perc, diet_perc, BMI, Weight, muscle_mass, Log_Date) values(1,89,78,26,91,75,TO_DATE('24-JAN-2021', 'DD-MON-YYYY'));
insert into Log(member_id, workout_perc, diet_perc, BMI, Weight, muscle_mass, Log_Date) values(2,76,89,28,84,80,TO_DATE('14-MAY-2020', 'DD-MON-YYYY'));
insert into Log(member_id, workout_perc, diet_perc, BMI, Weight, muscle_mass, Log_Date) values(3,94,100,17,69,64,TO_DATE('07-APR-2019', 'DD-MON-YYYY'));

commit;
