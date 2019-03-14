import React from 'react';
import ReactDOM from 'react-dom';
import CommentDetail from './CommentDetail';
import ApprovalCard from './ApprovalCard';

const App = () => {
    return (
        <div className="ui container comments">
        <ApprovalCard>
            <CommentDetail user="Lebron" comment="Yo AD the best in the league rn. Hands Down!"/>
        </ApprovalCard>
        <ApprovalCard>
            <CommentDetail user="Tommy boy" comment="Richard... whats happening?"/>
        </ApprovalCard>
        <ApprovalCard>
            <CommentDetail user="Gronk" comment="*Spikes football*"/>  
        </ApprovalCard>
        </div>
    );
}

ReactDOM.render(<App/>, document.querySelector('#root'));