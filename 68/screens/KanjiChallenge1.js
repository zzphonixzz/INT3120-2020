import React from 'react';
import {
  Image,
  FlatList,
  ScrollView,
  StyleSheet,
  Text,
  View,Dimensions
} from 'react-native';
import KanjiChallenge from '../components/KanjiChallenge'
const deviceWidth = Dimensions.get('window').width;

export default class KanjiChallenge1 extends React.Component {
  static navigationOptions = ({navigation}) => {
    return {
        title:'Kanji cơ bản 1',
        headerTitleAlign: 'center',
        headerTitleStyle: {
          color: 'white',
        },
        headerTintColor: 'white',
        headerStyle: {
          backgroundColor: '#006265',
        },
    };
  };
  render(){
    // const kanjiList = this.props.navigation.getParam('kanjiList')
    return (
       <View style={styles.container}>
           <View style={styles.Word}>
                 <Text style={styles.WordRandom}>Học</Text>
           </View>
          <View style={styles.content}>
          <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
           <KanjiChallenge/>
          </View>
       </View>
    );
  }
}
const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#006265',
    justifyContent:'center',
    
  },
  content: {
    flex:1,
    flexDirection: 'row',
    flexWrap: 'wrap',
    marginHorizontal: 8
  },
  Word: {
    flex:0,
    alignItems:'center',
    paddingTop: 25,
    paddingBottom: 10
  },
  WordRandom: {
      fontSize: 35,
      color:'#fff',
      fontWeight:'700'
  }
});
