# Tables

## User

|  | id | name | email | password | created_at | icon_filename | introduction | cover_filename | birthday |
|---|---|---|---|---|---|---|---|---|---|
| type | INT | TEXT | TEXT | TEXT | DATETIME | TEXT | TEXT | TEXT | DATE |

## follow_relationship

|  | id | follower_id | followee_id | created_at |
|---|---|---|---|---|
| type | INT | INT | INT | DATETIME |

## messages

|  | id | user_id | message | image_filename | created_at |
|---|---|---|---|---|---|
| type | INT | TEXT | TEXT | TEXT | DATETIME |
