<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pohon Keputusan</title>
    <style>
        .tree ul {
            padding-top: 20px; 
            position: relative;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li {
            float: left; 
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li::before, .tree li::after{
            content: '';
            position: absolute; 
            top: 0; 
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%; 
            height: 20px;
        }
        .tree li::after{
            right: auto; 
            left: 50%;
            border-left: 1px solid #ccc;
        }

        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }

        .tree li:only-child{ 
            padding-top: 0;
        }

        .tree li:first-child::before, .tree li:last-child::after{
            border: 0 none;
        }
        .tree li:last-child::before{
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }
        .tree li:first-child::after{
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        .tree ul ul::before{
            content: '';
            position: absolute; 
            top: 0; 
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0; 
            height: 20px;
        }

        .tree li a{
            border: 1px solid #ccc;
            padding: 5px 10px;
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li a:hover, .tree li a:hover+ul li a {
            background: #c8e4f8; 
            color: #000; 
            border: 1px solid #94a0b4;
        }
        .tree li a:hover+ul li::after, 
        .tree li a:hover+ul li::before, 
        .tree li a:hover+ul::before, 
        .tree li a:hover+ul ul::before{
            border-color:  #94a0b4;
        }
    </style>
</head>
<body>
    <div class="tree">
        <ul id="decision-tree-container">
            <!-- Tree nodes will be inserted here by JavaScript -->
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const gejalas = @json($gejalas);
            const kecanduans = @json($kecanduans);

            function buildTree(gejala, kecanduans, parent = null) {
                const nodes = [];
                gejala.forEach(g => {
                    const node = {
                        text: g.kode_gejala,
                        children: []
                    };
                    const relatedKecanduans = kecanduans.filter(k => g.kecanduans.map(kg => kg.id).includes(k.id));
                    if (relatedKecanduans.length) {
                        relatedKecanduans.forEach(k => {
                            node.children.push({
                                text: k.kode_kecanduan,
                                children: []
                            });
                        });
                    }
                    nodes.push(node);
                });
                return nodes;
            }

            function createNode(nodeData) {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.textContent = nodeData.text;
                li.appendChild(a);

                if (nodeData.children && nodeData.children.length > 0) {
                    const ul = document.createElement('ul');
                    nodeData.children.forEach(childData => {
                        ul.appendChild(createNode(childData));
                    });
                    li.appendChild(ul);
                }

                return li;
            }

            function createDecisionTree(treeData) {
                const container = document.getElementById('decision-tree-container');
                container.innerHTML = '';
                container.appendChild(createNode(treeData));
            }

            const treeData = {
                text: "Gejala Kecanduan Game Online",
                children: buildTree(gejalas, kecanduans)
            };
            createDecisionTree(treeData);
        });
    </script>
</body>
</html>
