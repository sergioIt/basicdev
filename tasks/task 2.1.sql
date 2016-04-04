select  p.name, c.name
from people as p
left join people_city as pc on pc.people_id = p.id
left join city as c on pc.city_id = c.id
where pc.city_id in
(select id from city where name like  'Сочи' or c.name like 'Москва')
group by p.name