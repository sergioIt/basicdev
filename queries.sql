/**
запрос 1
 Выбрать всех людей, которые хоть раз путешествовали и отобразить около каждого список городов, где он бывал через запятую;
 */
select  p.name, GROUP_CONCAT(c.name) AS list
from people as p
left join people_city as pc on pc.people_id = p.id
left join city as c on pc.city_id = c.id
where pc.id is not null
group by p.name

/** запрос 2
выбрать имена людей, котрые были и в москве и в сочи*/
select p.name
from people_city as pc
  left join people as p on p.id=pc.people_id
where pc.city_id in
      (select id from city where name LIKE 'Сочи' or name LIKE 'Москва')
GROUP BY people_id
having count(people_id) = 2
;

/**запрос 3
Выбрать всех людей, которые были только в Москве и в Сочи
(основан на запросе 2) */
SELECT p.name
from people_city as pc
  left join people as p on p.id=pc.people_id
where people_id in (select p.id
                      from people_city as pc
                        left join people as p on p.id=pc.people_id
                      where pc.city_id in
                            (select id from city where name LIKE 'Сочи' or name LIKE 'Москва')
                      GROUP BY people_id
                      having count(people_id) = 2)
group by pc.people_id
having count(*) = 2