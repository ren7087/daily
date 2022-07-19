import axios from "axios";
import {useState, useEffect} from "react";
import ReactDOM from 'react-dom';
import styled from "styled-components";

const SCard = styled.div`
    background-color: #fff;
    box-shadow: #ddd 0px 0px 4px 2px;
    border-radius: 8px;
    padding: 16px;
`;

const SDl = styled.dl`
  text-align: left;
  margin-bottom: 0px;
  dt {
    float: left;
  }
  dd {
    padding-left: 32px;
    padding-bottom: 8px;
    overflow-wrap: break-word;
  }
`;


function Alldata()
{
    const [posts, setPosts] = useState([]);

    useEffect (
        ()=>{
            axios.get("/api/getposts").then((res)=>{
                setPosts(res.data.data);
            })
            .catch((e) => {
                console.log(e);
            })
        },
        []
    );

    return (
        <>
        {
            posts.map((post) => {
                return(
                    <>
                    <SCard key={post.id}>
                        <SDl>
                            <dt>お客様</dt>
                            <dd>{post.customer}</dd>
                            <dt>場所</dt>
                            <dd>{post.location}</dd>
                            <dt>商品</dt>
                            <dd>{post.product}</dd>
                            <dt>開始時間</dt>
                            <dd>{post.start}</dd>
                            <dt>終了時間</dt>
                            <dd>{post.end}</dd>
                            <dt>行為</dt>
                            <dd>{post.action}</dd>
                            <dt>交通手段</dt>
                            <dd>{post.transportation}</dd>
                            <dt>交通費</dt>
                            <dd>{post.fee}</dd>
                            <dt>内容</dt>
                            <dd>{post.content}</dd>
                            <dt>コメント</dt>
                            <dd>{post.comment}</dd>
                        </SDl>
                    </SCard>
                    </>
                )
            })
        }
        </>
    )
}

if (document.getElementById('alldata')) {
    ReactDOM.render(<Alldata />, document.getElementById('alldata'));
}
