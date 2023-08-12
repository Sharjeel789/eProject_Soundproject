var myPlaylist = [

	{
		mp3: 'music/1.mp3',
		title: 'Missing You',
		artist: 'Alexandra',
		rating: 5,
		buy: '#',
		price: '17',
		duration: '0:38',
		cover: 'music/1.jpg'
	},
	{
		mp3: 'music/4.mp3',
		title: 'Midnight In Tokyo',
		artist: 'BlueFoxMusic',
		rating: 4,
		buy: '#',
		price: '17',
		duration: '2:51',
		cover: 'music/4.jpg'
	},
	{
		mp3: 'music/5.mp3',
		title: 'Walking On Horizon',
		artist: 'Dejans',
		rating: 5,
		buy: '#',
		price: '17',
		duration: '4:29',
		cover: 'music/5.jpg'
	},
	{
		mp3: 'music/6.mp3',
		title: 'A Happy Carefree Day',
		artist: 'JoshKramerMusic',
		rating: 5,
		buy: '#',
		price: '13',
		duration: '2:45',
		cover: 'music/6.jpg'
	},
	{
		mp3: 'music/2.mp3',
		title: 'Through the Clouds',
		artist: 'Dejans',
		rating: 4,
		buy: '#',
		price: '17',
		duration: '5:56',
		cover: 'music/2.jpg'
	},
	{
		mp3: 'music/3.mp3',
		title: 'Live My Life',
		artist: 'Metrolightmusic',
		rating: 5,
		buy: '#',
		price: '17',
		duration: '2:31',
		cover: 'music/3.jpg'
	}
];


// jQuery(document).ready(function ($) {
// 	$('.music-player-list').ttwMusicPlayer(myPlaylist, {
// 		currencySymbol:'$',
// 		buyText:'BUY',
// 		tracksToShow:3,
// 		autoplay:true,
// 		ratingCallback:function(index, playlistItem, rating){
// 			//some logic to process the rating, perhaps through an ajax call
// 		},
// 		jPlayer:{
// 			swfPath: "js/Jplayer.swf",
// 			supplied: "mp3",
// 			volume:  0.8,
// 			wmode:"window",
// 			solution: "html,flash",
// 			errorAlerts: true,
// 			warningAlerts: false
// 		}
// 	});
// });

jQuery(document).ready(function ($) {
	// Make an AJAX call to get the video data from your Laravel backend
	$.ajax({
		url: '/media/getAudios',
		type: 'GET',
		dataType: 'json',
		success: function (data) {
			console.log(data);
			// Process the data to fit the myPlaylist format
			var myPlaylist = data.map(function (audio) {
				return {
					id: audio.id,
					mp3: audio.mediaURL,
					title: audio.mediaName,
					artist: audio.artist ? audio.artist.name : 'Unknown Artist',
					rating: audio.averageRating,
					buy: audio.buy,
					price: audio.price,
					duration: audio.duration,
					cover: audio.mediaPhoto
				};
			});

			// Initialize the music player with the fetched data
			$('.music-player-list').ttwMusicPlayer(myPlaylist, {
				currencySymbol: '$',
				buyText: 'BUY',
				tracksToShow: 3,
				autoplay: true,
				ratingCallback: function (index, playlistItem, rating) {
					// Some logic to process the rating, perhaps through an ajax call
					submitRating(index, rating, playlistItem);
				},
				jPlayer: {
					swfPath: "js/Jplayer.swf",
					supplied: "mp3",
					volume: 0.8,
					wmode: "window",
					solution: "html,flash",
					errorAlerts: true,
					warningAlerts: false
				}
			});
		},
		error: function (xhr, status, error) {
			console.error('Error fetching video data:', error);
		}
	});
});

// Function to submit the rating to the backend
function submitRating(index, rating, playlistItem) {
	// alert(index);
	// alert(rating);
	// alert(playlistItem.id);
	const notyf = new Notyf();

	$.ajax({
		url: '/media/submitRating',
		type: 'GET', // Use GET method
		dataType: 'json',
		data: {
			id: playlistItem.id,
			rating: rating,
		},
		success: function (data) {
			if (data.hasOwnProperty('message')) {
				// alert(data.message); // Show login messages
				notyf.open({
					type: 'error',
					message: data.message,
					duration: 2000,
					position: {
						y: 'top',
						x: 'right',
					},
				});
				$("#Register_PopUp_Link").trigger('click');
			} else {
				notyf.open({
					type: 'success',
					message: "Reviewed Successfuly",
					duration: 2000,
					position: {
						y: 'top',
						x: 'right',
					},
				});
			}
		},
		error: function (xhr, status, error) {
			console.error('Error submitting rating:', error);
		},
	});
}