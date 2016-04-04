select  p.name, GROUP_CONCAT(c.name) AS list
from people as p
left join people_city as pc on pc.people_id = p.id
left join city as c on pc.city_id = c.id
where pc.id is not null
group by p.name
