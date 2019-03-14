import React from 'react';
import faker from 'faker';

class CommentDetail extends React.Component {
    
    render() {
        return (
            <div className="comment">
                <a href="/" className="avatar">
                    <img alt="avatar" src={faker.image.avatar()}/>
                </a>
                <div className="content">
                <a href="/" className="author">
                    {this.props.user}
                </a>
                <div className="metadata">
                    <span className="date">Today at 9:03</span>
                </div>
                <div className="text">{this.props.comment}</div>
                </div>
            </div>
        )
    }
}

export default CommentDetail;