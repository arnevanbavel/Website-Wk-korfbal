using UnityEngine;
using System.Collections;

public class SmallifierUpgrade : MonoBehaviour {
	
	public float smallifierPercent = 0.25f;
	
	void OnTriggenter2D(Collider2D other)
	{
		if (other.tag == "Player") 
		{
				other.animation.Play("ShrinkingUpgrade");
				other.transform.localScale = new Vector3 (smallifierPercent, smallifierPercent, smallifierPercent);
			Destroy(this.gameObject);
		}
		
	}
}
