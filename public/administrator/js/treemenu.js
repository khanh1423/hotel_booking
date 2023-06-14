const PptAPI = 'http://127.0.0.1:8000/api'

function getItem(){
    fetch(PptAPI)
        .then(function(response){
            return response.json()
        })
        .then((data)=>{
            console.log(TreeMenu(data));
        })
}
getItem()
class Node {
    constructor(id, uuid, parent_id, status, name, locale, user_id, deleted_at, created_at, updated_at) {
        this.id = id;
        this.uuid = uuid;
        this.parent_id = parent_id;
        this.status = status;
        this.name = name;
        this.locale = locale;
        this.user_id = user_id;
        this.deleted_at = deleted_at;
        this.created_at = created_at;
        this.updated_at = updated_at;
        this.children = [];
    }
}
function TreeMenu(data) {
    const nodes = {};

    // Tạo các đối tượng Node
    data.forEach(item => {
        nodes[item.id] = new Node(
            item.id,
            item.uuid,
            item.parent_id,
            item.status,
            item.name,
            item.locale,
            item.user_id,
            item.deleted_at,
            item.created_at,
            item.updated_at
        );
    });
    Object.values(nodes).forEach(node => {
        if (node.parent_id !== node.id) {
            const parent = nodes[node.parent_id];
            if (parent) {
                parent.children.push(node);
            }
        }
    });
    return Object.values(nodes).find(node => node.parent_id === node.id);
}
// const propertiesEle = document.getElementById('propertiesPage');

// {/* <tr>
//     <td>nmn</td>
//     <td>nmn</td>
//     <td>nmn</td>
//     <td>nmn</td> làm 
// </tr> */}

// console.log(propertiesEle);