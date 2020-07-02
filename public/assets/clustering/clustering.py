import mysql.connector
import sys
from sklearn.cluster import KMeans

data = []
label = []
dt = []
value = list()
count = 0

connect = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="clustering"
)

cursor = connect.cursor()

cursor.execute("Select user_id, latH, lngH from coordinates")

results = cursor.fetchall()
for rlt in results:
    data.append([float(rlt[1]), float(rlt[2])])

kmeans = KMeans(n_clusters=4, init="k-means++", random_state=0).fit(data)

label = kmeans.labels_

userId = sys.argv[1]

cursor.execute(
    "Select user_id, latH, lngH from coordinates c join users u on c.user_id = u.id where c.user_id=" + userId)
rs = cursor.fetchall()
for r in rs:
    dt.append([float(r[1]), float(r[2])])
init = kmeans.predict(dt)

for (i, j) in zip(results, label.tolist()):
    value.append((j+1, i[0]))
    if int(userId) == int(i[0]):
        count += 1
if count == 0:
    value.append((int(userId)+1, int(init[0])))

sql1 = "Truncate table groups"

for v in value:
    cursor.execute("SET FOREIGN_KEY_CHECKS=0")
    sql2 = "Update users set group_id = %s where id = %s"
    cursor.execute(sql2, v)
    cursor.execute("SET FOREIGN_KEY_CHECKS=1")
    connect.commit()
connect.commit()
print(cursor.statement)
